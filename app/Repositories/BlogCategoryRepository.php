<?php

namespace App\Repositories;

use App\Models\BlogCategory;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class BlogCategoryRepository.
 */
class BlogCategoryRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return BlogCategory::class;
    }

    protected function convertToArray($model)
    {
        if(!is_null($model->parent))
        {
            $parent = $model->parent->toArray();
        } else
        {
            $parent = null;
        }
        $category = $model->toArray();

        return compact('category', 'parent');
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

    public function getForComboBox()
    {
        $columns = implode(', ', ['id', 'CONCAT (id, ". ", title) as id_title']);

        $result = $this->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $result;
    }

    public function getAllWithPaginate($perPage = null)
    {
        $columns = ['id', 'title', 'parent_id'];

        $result = $this->startConditions()
            ->select($columns)
            ->with(['parent:id,title'])
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
