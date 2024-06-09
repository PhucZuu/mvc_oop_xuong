<?php

// Website có các trang
    // Trang chủ
    // Giới thiệu
    // Danh sách sản phẩm
    // Chi tiết sản phẩm
    // Liên hệ

// Để định nghĩa đc. Phải tạo controller trc
// Tiếp theo khai báo function tương ứng để xử lý
// Cuối cùng, định nghĩa đường dẫn

// HTTP Method: get, post, put (path), delete, option, head

use Admin\XuongOop\Controllers\Client\AboutController;
use Admin\XuongOop\Controllers\Client\ContactController;
use Admin\XuongOop\Controllers\Client\HomeController;
use Admin\XuongOop\Controllers\Client\LoginController;
use Admin\XuongOop\Controllers\Client\NewsDetailController;


$router->get( "/",                  HomeController::class    . '@index');
$router->get( "/about",             AboutController::class   . '@index');

$router->get( "/contact",           ContactController::class . '@index');
$router->post( "/contact/store",    ContactController::class . '@store');

$router->get( "/login",             LoginController::class . '@showFormLogin');
$router->post( "/handle-login",     LoginController::class . '@login');
$router->get('/{id}/myaccount',     LoginController::class . '@showAccount');
$router->post('/{id}/save',         LoginController::class . '@saveChangeAccount');
$router->get( "/logout",            LoginController::class . '@logout');

$router->get( "/register",          LoginController::class . '@showFormRegister');
$router->post( "/handle-register",  LoginController::class . '@register');

$router->get('/{$id}/news-details',     NewsDetailController::class . '@showNews');
$router->get('/page/',                  HomeController::class       . '@listNewsPage');
$router->post('/result',                HomeController::class       . '@searchNews');
$router->get('/allnews/{id}/category',  HomeController::class       . '@allNewsByCategory');
$router->get('/allnews',                HomeController::class       . '@allNews');