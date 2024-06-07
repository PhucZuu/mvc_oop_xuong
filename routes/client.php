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
use Admin\XuongOop\Controllers\Client\ProductController;

$router->get( "/",                  HomeController::class    . '@index');
$router->get( "/about",             AboutController::class   . '@index');

$router->get( "/contact",           ContactController::class . '@index');
$router->post( "/contact/store",    ContactController::class . '@store');

$router->get( "/products",          ProductController::class . '@index');
$router->get( "/products/{id}",     ProductController::class . '@detail');

$router->get( "/login",             LoginController::class . '@showFormLogin');
$router->post( "/handle-login",     LoginController::class . '@login');
$router->post( "/logout",           LoginController::class . '@logout');

$router->get( "/register",          LoginController::class . '@showFormRegister');
$router->post( "/handle-register",  LoginController::class . '@register');

$router->get('/{$id}/news-details', NewsDetailController::class . '@showNews');
