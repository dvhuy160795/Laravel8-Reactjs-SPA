<?php

/**
 * User's Service - Define logic of method need have.
 *
 * @author HuyDV  <dvhuy160795@gmail.com>
 */

namespace App\Services;

use App\Repositories\UserRepository;
use Exception;

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
}
