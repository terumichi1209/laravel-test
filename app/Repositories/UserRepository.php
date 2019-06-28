<?php

namespace App\Repositories;

use App\Models\User;
use \Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    /**
     * @return Collection
     */
    public function list(): Collection
    {
        return User::all();
    }
}
