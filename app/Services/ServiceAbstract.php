<?php


namespace App\Services;


use Illuminate\Support\Facades\Log;

abstract class ServiceAbstract implements ServiceInterface
{
    protected $repository;

    public function __call($name, $arguments)
    {
        if (!in_array($name, get_class_methods($this))) {
            try {
                return $this->repository->{$name}($arguments[0], $arguments[1] ?? [], $arguments[2] ?? [], $arguments[3] ?? []);
            } catch (\Exception $exception) {
                Log::info($exception->getMessage());
                return false;
            }

        }
        // TODO: Implement __call() method.
    }
}
