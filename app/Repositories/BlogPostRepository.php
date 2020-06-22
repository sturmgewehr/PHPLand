<?php

namespace App\Repositories;

use App\Models\BlogPost;

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
            ])->paginate($perPage);

        return $result;
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
            ])->paginate($perPage);

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

        $converted = $this->convertToArray($model);

        return $converted;
    }

    public function destroy($id)
    {
        return $this->startConditions()->find($id)->delete();
    }
}
