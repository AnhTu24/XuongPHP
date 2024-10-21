<?php

use Phucle\Assignment\Controllers\Admin\UserController;
use Phucle\Assignment\Controllers\Admin\DashboardController;
use Phucle\Assignment\Controllers\Admin\ListsController;
use Phucle\Assignment\Controllers\Admin\NewsController;
use Phucle\Assignment\Controllers\Client\Login_registerController;

$router->before('GET|POST', '/admin/*.*', function () {
    if (!isset($_SESSION['user'])) {
        header('location: ' . url('login'));
        exit();
    }

    if (!isset($_SESSION['user']) && $_SESSION['user']['vaiTro'] == 'member') {
        header('location: ' . url('/'));
        exit();
    }

});


$router->mount('/admin', function () use ($router) {

    $router->get('/',                               DashboardController::class . '@dashboard');

    // CRUD USER
    $router->mount('/users', function () use ($router) {
        $router->get('/',                           UserController::class . '@index');
        $router->get('/create',                     UserController::class . '@create');
        $router->post('/store',                     UserController::class . '@store');
        $router->get('/{id}/show',                  UserController::class . '@show');
        $router->get('/{id}/edit',                  UserController::class . '@edit');
        $router->post('/{id}/update',               UserController::class . '@update');
        $router->post('/{id}/delete',               UserController::class . '@delete');
        $router->get('/restore',                    UserController::class . '@restore');
        $router->post('/{id}/update_restore',       UserController::class . '@update_restore');
        $router->get('/logout',                     UserController::class . '@logout');
    });

    // CRUD NEWS
    $router->mount('/news', function () use ($router) {
        $router->get('/',                           NewsController::class . '@index');
        $router->get('/create',                     NewsController::class . '@create');
        $router->post('/store',                     NewsController::class . '@store');
        $router->get('/{id}/show',                  NewsController::class . '@show');
        $router->get('/{id}/edit',                  NewsController::class . '@edit');
        $router->post('/{id}/update',               NewsController::class . '@update');
        $router->post('/{id}/delete',               NewsController::class . '@delete');
        $router->get('/restore',                    NewsController::class . '@restore');
        $router->post('/{id}/update_restore',       NewsController::class . '@update_restore');
        $router->post('/{id}/none',                 NewsController::class . '@none');
        $router->post('/{id}/delete_new',           NewsController::class . '@delete_new');
    });

    // CRUD LISTS NEWS
    $router->mount('/lists', function () use ($router) {
        $router->get('/',                           ListsController::class . '@index');
        $router->get('/create',                     ListsController::class . '@create');
        $router->post('/store',                     ListsController::class . '@store');
        $router->get('/{id}/show',                  ListsController::class . '@show');
        $router->get('/{id}/edit',                  ListsController::class . '@edit');
        $router->post('/{id}/update',               ListsController::class . '@update');
        $router->post('/{id}/delete',               ListsController::class . '@delete');
        $router->get('/restore',                    ListsController::class . '@restore');
        $router->post('/{id}/update_restore',       ListsController::class . '@update_restore');
    });
});