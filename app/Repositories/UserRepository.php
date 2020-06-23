<?php

namespace App\Repositories;

use App\User;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class UserRepository.
 */
class UserRepository extends CoreRepository
{
    /**
     * @return string
     *  Return the model
     */
    protected function getModelClass()
    {
        return User::class;
    }

    protected function convertToArray($model)
    {
        $userRole = $model->userRole;
        $user = $model->toArray();
        return compact('user', 'userRole');
    }

    protected function convertPaginatedToArray($items, $perPage)
    {
        $converted = [];
        foreach($items as $item)
        {
            $converted[] = $this->convertToArray($item);
        }

        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $currentConvertedItems = array_slice($converted, $perPage * ($currentPage - 1), $perPage);

        $paginator = new LengthAwarePaginator($currentConvertedItems, count($converted), $perPage,
            LengthAwarePaginator::resolveCurrentPage(), ['path' => LengthAwarePaginator::resolveCurrentPath()]);
        return $paginator;
    }

    public function getEdit($id)
    {
        $model = $this->startConditions()->find($id);

        $converted = $this->convertToArray($model);

        return $converted;
    }

    public function getAllWithPaginate($perPage = null)
    {
        $columns = [
            'id',
            'name',
            'email',
            'is_admin',
            'is_banned',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->get();

        $paginator = $this->convertPaginatedToArray($result, $perPage);

        return $paginator;
    }

    public function create(array $input)
    {
        $model = $this->startConditions();

        $model->fill($input);

        $result = $model->save();

        return $result;
    }

    public function update($id, array $input)
    {
        $model = $this->startConditions()->find($id);

        $model->fill($input);

        $model->save();

        $converted = $this->convertToArray($model);

        return $converted;
    }

    public function destroy($id)
    {
        return $this->startConditions()->find($id)->delete();
    }
}
