<?php

namespace App\Repositories;

use App\Entities;
use App\Factories\UserFactory;
use App\Models\User;
use \Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    /**
     * @param array $request_params
     * @return Entities\User
     * @throws \Exception
     */
    public function new(array $request_params): Entities\User
    {
        return (new UserFactory)->make(
            $request_params['name'],
            $request_params['email'],
            $request_params['password']
        );
    }

    /**
     * @return Collection
     */
    public function list(): Collection
    {
        return User::all();
    }


    /**
     * @param Entities\User $user
     * @return bool
     */
    public function store(Entities\User $user): bool
    {
        return (new User([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword()
        ]))->save();
    }
}
