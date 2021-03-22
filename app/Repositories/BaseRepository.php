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
        return $this->model->where('status', 1)->get();
    }

    public function findById($id)
    {
        return $this->model->where([ 'id' => $id, 'status' => 1])->first();
    }

    public function saveData($data)
    {
        return $this->model->create($data);
    }

    public function dataUpdate($data, $id)
    {
        $find = $this->model->find($id);
        $find->update($data);
        return $this->model->find($id);
    }

    public function deleteData($id)
    {
        $data = $this->model->find($id);
        return $data->delete();
    }
}
