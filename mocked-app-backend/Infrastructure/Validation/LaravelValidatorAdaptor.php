<?php

namespace Infrastructure\Validation;

use Illuminate\Support\Facades\Validator;
use Mocked\Domain\Contracts\Validation\UserValidatorInterface;

class LaravelValidatorAdaptor implements UserValidatorInterface
{
    private $validator;
    private $validationObject;


    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function isValidUser($userData)
    {
        $this->validationObject = $this->validator::make($userData,[
            'name' => 'required|string|max:20',
            'age' => 'required|integer|min:12',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8'
        ]);

        return !$this->validationObject->fails();

    }

    public function getErrors()
    {
        return $this->validationObject->errors();;
    }
}
