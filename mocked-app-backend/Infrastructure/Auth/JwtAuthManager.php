<?php
namespace Infrastructure\Auth;

use Mocked\Domain\Contracts\Auth\AuthManagerInterface;

class JwtAuthManager implements AuthManagerInterface
{
    private $jwtManager;
    private $token;

    public function __construct($jwtManager) {
        $this->jwtManager = $jwtManager;
    }

    public function check()
    {
        return !!$this->jwtManager::user();
    }

    public function isValidCredntials($credentials)
    {
        $this->token = $this->jwtManager::attempt($credentials);
        return !!$this->token;
    }

    public function getSessionData()
    {
        return [
            'token' => $this->token,
            'expires_in' => $this->jwtManager::factory()->getTTL() * 60
        ];
    }

    public function destroySession()
    {
        $this->jwtManager::logout();
    }
}

