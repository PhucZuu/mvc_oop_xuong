<?php

// CRUD bao gồm: Danh sách, thêm, sửa, xem, xóa
// User:
//      GET     -> USER/INDEX       -> INDEX        -> Danh sách
//      GET     -> USER/CREATE      -> CREATE       -> HIỂN THỊ FORM THÊM MỚI
//      POST    -> USER/STORE       -> STORE        -> LƯU DỮ LIỆU TỪ FORM THÊM MỚI VÀO DB
//      GET     -> USER/ID/SHOW     -> SHOW (ID)    -> XEM CHI TIẾT
//      GET     -> USER/ID/EDIT     -> EDIT (ID)    -> HIỂN THỊ FORM CẬP NHẬT
//      PUT     -> USER/ID/UPDATE   -> UPDATE (ID)  -> LƯU DỮ LIỆU TỪ FORM CẬP NHẬT VÀO DB
//      DELETE  -> USER/ID/DELETE   -> DELETE (ID)  -> XÓA BẢN GHI TRONG DB

use Admin\XuongOop\Controllers\Admin\DashboardController;
use Admin\XuongOop\Controllers\Admin\CategoryController;
use Admin\XuongOop\Controllers\Admin\NewsController;
use Admin\XuongOop\Controllers\Admin\UserController;


$router->before('GET|POST', '/admin/*.*', function() {
    if (!is_logged()) 
    {
        header('Location: ' . url('login'));
        exit();
    }

    if(!is_admin())
    {
        header('Location: ' . url());
        exit();
    }

});

$router->mount('/admin', function () use ($router) {

    $router->get('/', DashboardController::class . '@dashboard');

    // CRUD USER
    $router->mount('/users', function () use ($router) {

        $router->get('/',             UserController::class . '@index');
        $router->get('/{id}/show',    UserController::class . '@show');
        $router->get('/{id}/edit',    UserController::class . '@edit');
        $router->post('/{id}/update', UserController::class . '@update');
        $router->post('/{id}/ban',    UserController::class . '@banAcc');
        $router->post('/{id}/delete', UserController::class . '@delete');
        
    });

    $router->mount('/categories', function () use ($router) {

        $router->get('/',                   CategoryController::class . '@index');
        $router->get('/create',             CategoryController::class . '@create');
        $router->post('/store',             CategoryController::class . '@store');
        $router->get('/{id}/show',          CategoryController::class . '@show');
        $router->get('/{id}/edit',          CategoryController::class . '@edit');
        $router->post('/{id}/update',       CategoryController::class . '@update');
        $router->post('/{id}/restore',      CategoryController::class . '@restore');
        $router->post('/{id}/soft-delete',  CategoryController::class . '@softDelete');
        $router->post('/{id}/hard-delete',  CategoryController::class . '@hardDelete');
        
    });

    $router->mount('/news', function () use ($router) {

        $router->get('/',                   NewsController::class . '@index');
        $router->get('/create',             NewsController::class . '@create');
        $router->post('/store',             NewsController::class . '@store');
        $router->get('/{id}/show',          NewsController::class . '@show');
        $router->get('/{id}/edit',          NewsController::class . '@edit');
        $router->post('/{id}/update',       NewsController::class . '@update');
        $router->post('/{id}/hidden',       NewsController::class . '@hidden');
        $router->post('/{id}/delete',       NewsController::class . '@delete');
        
    });
    
});
