<?php


namespace App\Services;

use App\Repositories\UserRepository;

class UserService extends ServiceAbstract
{
    protected $repository;
    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function getUser()
    {
        dd($this->repository->model());
    }
}
