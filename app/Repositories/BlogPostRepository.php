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
        return $this->startConditions()->find($id);
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
}
