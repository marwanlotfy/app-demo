<?php

use App\Http\Controllers\UsersController;

$router->get('/',[ UsersController::class ,'index' ])->middleware('auth');
$router->post('/',[ UsersController::class ,'store' ]);
