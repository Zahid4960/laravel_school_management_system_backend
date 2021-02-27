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
        return $this->model->active()->get();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function saveData(array $data)
    {
        return $this->model->create($data);
    }

    public function getActive()
    {
        return $this->getAll()->where('status', 1);
    }

    public function deleteData($id)
    {
        $data = $this->findById($id);

        return $data->delete();
    }
}
