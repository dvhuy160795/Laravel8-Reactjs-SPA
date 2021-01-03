<?php

/**
 * User's Service - Define logic of method need have.
 *
 * @author HuyDV  <dvhuy160795@gmail.com>
 */

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Exception;
use phpDocumentor\Reflection\Types\Collection;

/**
 * Class UserService.
 *
 * @package App\Services
 * @author  HuyDV  <dvhuy160795@gmail.com>
 */
class UserService extends ServiceAbstract
{

    /**
     * User's repository.
     *
     * @var UserRepository
     */
    protected $repository;

    /**
     * UserService constructor.
     *
     * @param UserRepository $userRepository : Object UserRepository.
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    /**
     * Get user's info
     *
     * @return object
     * @throws Exception
     */
    public function getUser()
    {
        return $this->repository->model();
    }

    /**
     * Get list user
     *
     * @return array
     * @throws Exception
     */
    public function getUsers()
    {
        $fields = [
            'id',
            'name',
            'email',
            'photo_path',
        ];
        return $this->repository->getUsers($fields)->toArray();
    }

    /**
     * Update user.
     *
     * @param  int   $id
     * @param  array $data
     * @return int
     * @throws Exception
     */
    public function updateUser(int $id, array $data)
    {
        return $this->repository->update($id, $data);
    }
}
