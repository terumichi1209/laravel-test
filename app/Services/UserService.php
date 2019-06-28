<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    /** UserRepository */
    private $user_repos;

    public function __construct()
    {
        $this->user_repos = new UserRepository;
    }

    /**
     * @return Collection
     */
    public function list(): Collection
    {
        return $this->user_repos->list();
    }
}
