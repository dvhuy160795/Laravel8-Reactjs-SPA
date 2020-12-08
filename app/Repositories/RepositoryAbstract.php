<?php


namespace App\Repositories;
use Exception;

abstract class RepositoryAbstract implements RepositoryInterface
{
    protected $model;

    /**
     * @return Illuminate\Database\Eloquent\Model
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function makeModel()
    {
        if (empty($this->model)) {
            throw new Exception("Must assign property `model` to a Model class");
        }

        $model = app()->make($this->model);

        if (!$model instanceof \Illuminate\Database\Eloquent\Model) {
            $modelClass = $this->model;
            throw new Exception("Class {$modelClass} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $model;
    }

    /**
     * @return Illuminate\\Database\\Eloquent\\Model
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function model() {
        return $this->makeModel();
    }

    /**
     * @param $id
     * @return Illuminate\\Database\\Eloquent\\Model
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function getOne($id)
    {
        return $this->model()->findOrFail($id);
    }

    /**
     * @param array $conditions
     * @return Illuminate\\Database\\Eloquent\\Model
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function getMany(array $conditions)
    {
        return $this->model()->where($conditions)->get();
    }

    /**
     * @param array $data
     * @return Illuminate\\Database\\Eloquent\\Model
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function insert(array $data)
    {
        return $this->model()->create($data);
    }

    /**
     * @param array $data
     * @return boolean
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function insertMany(array $data)
    {
        return $this->model()->insert($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return Illuminate\\Database\\Eloquent\\Model
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update($id, array $data)
    {
        return $this->model()->update($id, $data);
    }

    /**
     * @param $id
     * @return boolean
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function delete($id)
    {
        return $this->model()->delete($id);
    }

    /**
     * @param array $conditions
     * @return boolean
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function deleteMany(array $conditions)
    {
        return $this->model()->where($conditions)->delete();
    }
}
