<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class CoreRepository.
 */
abstract class CoreRepository
{
    protected $model;

    /**
     * @return string
     *  Return the model
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    abstract public function getModelClass();

    protected function startConditions()
    {
        return clone $this->model;
    }


}
