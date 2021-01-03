<?php

/**
 * Service abstract - Define logic of method need have.
 *
 * @author HuyDV  <dvhuy160795@gmail.com>
 */

namespace App\Services;

use App\Repositories\RepositoryAbstract;
use App\Repositories\RepositoryInterface;
use Illuminate\Support\Facades\Log;

/**
 * Class ServiceAbstract.
 *
 * @package App\Services
 * @author  HuyDV  <dvhuy160795@gmail.com>
 */
abstract class ServiceAbstract implements ServiceInterface
{

    /**
     * Define repository.
     *
     * @var RepositoryInterface
     */
    protected $repository;

    /**
     * Init call function.
     *
     * @param  string $name
     * @param  array  $arguments
     * @return bool
     */
    public function __call(string $name, array $arguments)
    {
        if (!in_array($name, get_class_methods($this))) {
            try {
                return $this->repository->{$name}(
                    $arguments[0],
                    $arguments[1] ?? [],
                    $arguments[2] ?? [],
                    $arguments[3] ?? []
                );
            } catch (\Exception $exception) {
                Log::info($exception->getMessage());
                return false;
            }
        }
        return false;
    }
}
