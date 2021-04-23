<?php
namespace Mocked\Domain\Contracts\Repositories;

use Mocked\Domain\Users\User;

interface UserRepositoryInterface {
    public function getAll();
    public function store(User $user);
}

