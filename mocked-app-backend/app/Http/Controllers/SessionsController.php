<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mocked\Domain\Contracts\Auth\AuthManagerInterface;
use Mocked\Domain\Contracts\Represntation\SessionRepresntationInterface;

class SessionsController extends Controller
{
    private $auth;
    private $reprsenter;

    public function __construct(AuthManagerInterface $auth,SessionRepresntationInterface $reprsenter)
    {
        $this->auth = $auth;
        $this->reprsenter = $reprsenter;
    }

    public function store(Request $request)
    {
        if ($this->auth->isValidCredntials($request->all())) {
           return  $this->reprsenter->representSession($this->auth->getSessionData());
        }

        return $this->reprsenter->representErrors();
    }

    public function destroy()
    {
        $this->auth->destroySession();
    }

}
