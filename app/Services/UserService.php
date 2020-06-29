<?php


namespace App\Services;


use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService
{
    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct()
    {
        $this->repository = app(UserRepository::class);
    }

    protected function isExist($item)
    {
        if(empty($item))
        {
            abort(404);
        }
    }

    public function getAllWithPaginate($perPage = null)
    {
        return $this->repository->getAllWithPaginate($perPage);
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

    public function getEdit($id)
    {
        $item = $this->repository->getEdit($id);

        $this->isExist($item);

        return $item;
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }

    public function changePassword(array $passwords)
    {
        return $this->repository->changePassword($passwords);
    }
}
