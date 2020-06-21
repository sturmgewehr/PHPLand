<?php


namespace App\Services;


abstract class BaseService
{
    abstract public function getAllWithPaginate($perPage = null);

    abstract public function getEdit($id);

    abstract public function destroy($id);

    abstract public function create(array $input);

    abstract public function update($id, array $input);
}
