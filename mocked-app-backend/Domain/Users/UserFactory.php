<?php
namespace Mocked\Domain\Users;

use Mocked\Domain\Contracts\Factories\UserFactoryInterface;

class UserFactory implements UserFactoryInterface
{
    public function create($userData)
    {
        $user = new User;
        return $user->setEmail($userData['email'])
                    ->setPassword($userData['password'])
                    ->setName($userData['name'])
                    ->setAge($userData['age']);

    }
}

