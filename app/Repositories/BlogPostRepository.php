<?php

namespace App\Repositories;

use App\Models\BlogPost;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class BlogPostRepository.
 */
class BlogPostRepository extends CoreRepository
{
    /**
     * @return string
     *  Return the model
     */
    protected function getModelClass()
    {
        return BlogPost::class;
    }

    protected function convertToArray($model)
    {
        $user = $model->user->toArray();
        $category = $model->category->toArray();
        $post = $model->toArray();

        return compact('post', 'user', 'category');
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

    public function getAllWithPaginate($perPage = null)
    {
        $columns = [
            'id',
            'title',
            'user_id',
            'category_id',
            'published_at',
            'is_published',
            'excerpt',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->with([
                'category:id,title',
                'user:id,name',
            ])->get();

        $paginator = $this->convertPaginatedToArray($result, $perPage);

        return $paginator;
    }

    public function getEdit($id)
    {
        $model = $this->startConditions()->find($id);

        $converted = $this->convertToArray($model);

        return $converted;
    }

    public function getAllPublishedWithPaginate($perPage = null)
    {
        $columns = [
            'id',
            'title',
            'user_id',
            'category_id',
            'published_at',
            'is_published',
            'excerpt',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->where('is_published', 1)
            ->orderBy('id', 'DESC')
            ->with([
                'category:id,title',
                'user:id,name',
            ])->get();

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
