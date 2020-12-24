<?php

/**
 * Repository abstract - Define logic of method need have
 *
 * @author HuyDV  <dvhuy160795@gmail.com>
 */

namespace App\Repositories;

use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RepositoryAbstract.
 *
 * @package App\Repositories
 * @author  HuyDV  <dvhuy160795@gmail.com>
 */
abstract class RepositoryAbstract implements RepositoryInterface
{

    /**
     * Model's name
     *
     * @var Model:class
     */
    protected $model;

    /**
     * Make object model.
     *
     * @return object
     * @throws Exception
     */
    private function makeModel()
    {
        if (empty($this->model)) {
            throw new Exception('Must assign property `model` to a Model class');
        }

        $model = app()->make($this->model);

        if (!$model instanceof Model) {
            $modelClass = $this->model;
            throw new Exception(
                "Class $modelClass must be an instance of Model"
            );
        }

        return $model;
    }

    /**
     * Object model after validate.
     *
     * @return object
     * @throws Exception
     */
    public function model(): object
    {
        return $this->makeModel();
    }

    /**
     * Get one record.
     *
     * @param  int $id : Record's Id.
     * @return object|null
     * @throws Exception
     */
    public function getOne(int $id)
    {
        return $this->model()->findOrFail($id);
    }

    /**
     * Get many record.
     *
     * @param  array $conditions : Query conditions.
     * @return object
     * @throws Exception
     */
    public function getMany(array $conditions): object
    {
        return $this->model()->where($conditions)->get();
    }

    /**
     * Insert new record.
     *
     * @param  array $data : New record's data.
     * @return object
     * @throws Exception
     */
    public function create(array $data): object
    {
        return $this->model()->create($data);
    }

    /**
     * Insert multi record.
     *
     * @param  array $datas : List record's data.
     * @return object
     * @throws Exception
     */
    public function insertMany(array $datas): object
    {
        return $this->model()->insert($datas);
    }

    /**
     * Update record.
     *
     * @param  int   $id   : Record's id need update.
     * @param  array $data : Record's data need update.
     * @return object
     * @throws Exception
     */
    public function update(int $id, array $data): object
    {
        return $this->model()->update($id, $data);
    }

    /**
     * Delete record.
     *
     * @param  int $id : Record's id need delete.
     * @return bool
     * @throws Exception
     */
    public function delete(int $id): bool
    {
        return $this->model()->delete($id);
    }

    /**
     * Delete multi record.
     *
     * @param  array $conditions : Query conditions.
     * @return bool
     * @throws Exception
     */
    public function deleteMany(array $conditions): bool
    {
        return $this->model()->where($conditions)->delete();
    }
}
