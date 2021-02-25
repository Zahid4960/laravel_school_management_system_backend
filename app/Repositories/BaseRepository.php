<?php


namespace App\Repositories;


abstract class BaseRepository
{
    protected $model;

    public function __construct($model)
    {
        $this->model = new $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }
}
