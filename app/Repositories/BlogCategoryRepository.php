<?php

namespace App\Repositories;

use App\Models\BlogCategory;

/**
 * Class BlogCategoryRepository.
 */
class BlogCategoryRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return BlogCategory::class;
    }

    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
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
            ->paginate($perPage);

        return $result;
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

        return $model;
    }

    public function destroy($id)
    {
        return $this->startConditions()->delete($id);
    }
}
