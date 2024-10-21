<?php

use Phucle\Assignment\Controllers\Client\HomeController;
use Phucle\Assignment\Controllers\Client\Login_registerController;
use Phucle\Assignment\Controllers\Client\UserController;
use Phucle\Assignment\Models\User;

$router->get('', HomeController::class . '@home');

$router->get('/register',               Login_registerController::class . '@showFromRegister');
$router->post('/register-handle',       Login_registerController::class . '@register');

$router->get('/login',                  Login_registerController::class .  '@showFromLogin');
$router->post('/login-handle',          Login_registerController::class .  '@login');
$router->get( '/logout',                Login_registerController::class .  '@logout');

$router->get('/{id}/newDetail',         HomeController::class . '@newDetail');
$router->get('/{id}/loadList',          HomeController::class . '@loadList');
$router->post('/search',                HomeController::class . '@searchNews');

$router->get('/{id}/editUse',           UserController::class . '@edit');
$router->post('/{id}/update',           UserController::class . '@update');








