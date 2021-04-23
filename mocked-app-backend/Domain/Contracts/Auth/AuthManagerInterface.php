<?php
namespace Mocked\Domain\Contracts\Auth;

interface AuthManagerInterface{
    public function isValidCredntials($credentials);
    public function getSessionData();
    public function check();
    public function destroySession();
}

