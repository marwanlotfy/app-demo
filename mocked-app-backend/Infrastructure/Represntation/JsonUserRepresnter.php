<?php
namespace Infrastructure\Represntation;

use Mocked\Contracts\Represntation\UserRepresnterInterface;
use Mocked\Domain\Users\User;

class JsonUserRepresnter extends AbstractJsonRepresnter implements UserRepresnterInterface
{

    public function represent($users)
    {
        $mappedUsers = array_map(function (User $user)
        {
            return [
                'id' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'age' => $user->getAge()
            ];
        },$users);

        return $this->response::json(['users' => $mappedUsers]);
    }
}


