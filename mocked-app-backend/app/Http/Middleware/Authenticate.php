<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Mocked\Domain\Contracts\Auth\AuthManagerInterface;
use Mocked\Domain\Contracts\Represntation\SessionRepresntationInterface;

class Authenticate
{
    protected $authManager;
    protected $represnter;

    public function __construct(AuthManagerInterface $authManager,SessionRepresntationInterface $represnter)
    {
        $this->authManager = $authManager;
        $this->represnter = $represnter;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($this->authManager->check()){
            return $next($request);
        }
        return $this->represnter->representErrors();
    }
}
