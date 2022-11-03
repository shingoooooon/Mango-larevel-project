<?php

namespace App\Repositories;

//use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\User;

/**
 * Interface UserRepository.
 *
 * @package namespace App\Repositories;
 */
//interface UserRepository extends RepositoryInterface
//{
//    //
//}

class UserRepository extends BaseRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return User::class;
    }
}
