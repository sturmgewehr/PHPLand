<?php


namespace App\Services;


use App\Repositories\BlogCategoryRepository;

class BlogCategoryService extends BaseService
{
    /**
     * @var BlogCategoryService
     */
    private $repository;

    public function __construct()
    {
        $this->repository = app(BlogCategoryRepository::class);
    }

    public function isExist($item)
    {
        if(empty($item))
        {
            abort(404);
        }
    }

    public function create(array $input)
    {
        $result = $this->repository->create($input);

        $this->isExist($result);

        return $result;
    }

    public function update($id, array $input)
    {
        $item = $this->repository->update($id, $input);

        $this->isExist($item);

        return $item;
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }

    public function getEdit($id)
    {
        $item = $this->repository->getEdit($id);

        $this->isExist($item);

        return $item;
    }

    public function getAllWithPaginate($perPage = null)
    {
        return $this->repository->getAllWithPaginate($perPage);
    }

    public function getForComboBox()
    {
        return $this->repository->getForComboBox();
    }
}
