<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mocked\Contracts\Represntation\UserRepresnterInterface;
use Mocked\Domain\Contracts\Factories\UserFactoryInterface;
use Mocked\Domain\Contracts\Validation\UserValidatorInterface;
use Mocked\Domain\Contracts\Repositories\UserRepositoryInterface;

class UsersController extends Controller
{
    protected $users;

    public function __construct(UserRepositoryInterface $users) {
        $this->users = $users;
    }

    public function index(UserRepresnterInterface $represnter)
    {
        return  $represnter->represent( $this->users->getAll() );
    }

    public function store(Request $request,UserFactoryInterface $userFactory ,UserValidatorInterface $validator)
    {
        if ($validator->isValidUser($request->all())) {
            $this->users->store(
                $userFactory->create($request->all())
            );
        }else {
            return $validator->getErrors();
        }
    }
}
