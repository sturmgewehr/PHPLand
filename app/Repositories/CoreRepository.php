<?php

namespace App\Repositories;

/**
 * Class CoreRepository.
 */
abstract class CoreRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    abstract protected function getModelClass();

    protected function startConditions()
    {
        return clone $this->model;
    }

    abstract public function getAllWithPaginate($perPage = null);

    abstract public function getEdit($id);

    abstract public function create(array $input);

    abstract public function update($id, array $input);

    abstract public function destroy($id);
}
