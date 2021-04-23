<?php

use App\Http\Controllers\SessionsController;

$router->post('/',[ SessionsController::class, 'store' ] );
$router->delete('/',[ SessionsController::class , 'destroy'])->middleware('auth');
