<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    /**
     * Get model from table model
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function model();

    /**
     * @param $id
     * @return Illuminate\Database\Eloquent\Model
     */
    public function getOne($id);

    /**
     * @param array $conditions
     * @return Illuminate\Database\Eloquent\Model
     */
    public function getMany(array $conditions);

    /**
     * @param array $data
     * @return Illuminate\Database\Eloquent\Model
     */
    public function insert(array $data);

    /**
     * @param array $data
     * @return Illuminate\Database\Eloquent\Model
     */
    public function insertMany(array $data);

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param array $conditions
     * @return mixed
     */
    public function deleteMany(array $conditions);
}
