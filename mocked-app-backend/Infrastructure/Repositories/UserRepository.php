<?php
namespace Infrastructure\Repositories;

use Mocked\Domain\Users\User;
use Mocked\Domain\Contracts\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    private $model;
    private $hashService;

    public function __construct( $model , $hashService )
    {
        $this->model = $model;
        $this->hashService = $hashService;
    }

    public function getAll()
    {
        $usersRecoreds = $this->model->all();

        $users = [];

        foreach ($usersRecoreds as $userRecord) {
            $user = new User;
            $user->setId($userRecord->id);
            $user->setName($userRecord->name);
            $user->setEmail($userRecord->email);
            $user->setAge($userRecord->age);
            $users[] = $user;
        }

        return $users;

    }

    public function store(User $user)
    {
        $this->model->create([
            'age' => $user->getAge(),
            'name' => $user->getName(),
            'password' => $this->hashService::make( $user->getPassword() ),
            'email' => $user->getEmail()
        ]);
    }
}


