<?php

/**
 * User's Repository
 *
 * @author HuyDV  <dvhuy160795@gmail.com>
 */

namespace App\Repositories;

use App\Models\User;
use stdClass;

/**
 * Class UserRepository.
 *
 * @package App\Repositories.
 * @author  HuyDV  <dvhuy160795@gmail.com>
 */
class UserRepository extends RepositoryAbstract
{

    /**
     * User's model name
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Insert new user.
     *
     * @param  array $user : New user's info.
     * @return object
     */
    public function insert(array $user): object
    {
        // TODO: Implement insert() method.
        return new StdClass($user);
    }
}
