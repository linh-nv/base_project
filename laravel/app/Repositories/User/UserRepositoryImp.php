<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepositoryImp extends BaseRepository implements UserRepository
{
    public function getModel(): string
    {

        return User::class;
    }
}
