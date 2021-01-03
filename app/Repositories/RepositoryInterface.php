<?php

/**
 * Repository interface - Methods need have
 *
 * @author HuyDV  <dvhuy160795@gmail.com>
 */

namespace App\Repositories;

/**
 * Interface RepositoryInterface
 *
 * @package App\Repositories
 * @author  HuyDV  <dvhuy160795@gmail.com>
 */
interface RepositoryInterface
{

    /**
     * Get model from table model.
     *
     * @return object
     */
    public function model(): object;

    /**
     * Get one record initial.
     *
     * @param  int $id : Record's Id.
     * @return object|null
     */
    public function getOne(int $id);

    /**
     * Get many record initial.
     *
     * @param  array $conditions : Query conditions.
     * @return object
     */
    public function getMany(array $conditions): object;

    /**
     * Insert new record initial.
     *
     * @param  array $data : New record's data.
     * @return object
     */
    public function create(array $data): object;

    /**
     * Insert multi record initial.
     *
     * @param  array $datas : List record's data.
     * @return object
     */
    public function createMany(array $datas): object;

    /**
     * Update record initial.
     *
     * @param  int   $id   : Record's id need update.
     * @param  array $data : Record's data need update.
     * @return int
     */
    public function update(int $id, array $data): int;

    /**
     * Delete record initial.
     *
     * @param  int $id : Record's id need delete.
     * @return bool
     */
    public function delete(int $id): bool;

    /**
     * Delete multi record initial.
     *
     * @param  array $conditions : Query Conditions.
     * @return bool
     */
    public function deleteMany(array $conditions): bool;
}
