<?php

namespace Mocked\Domain\Contracts\Validation;

interface UserValidatorInterface{
    public function isValidUser($userData);
    public function getErrors();
}
