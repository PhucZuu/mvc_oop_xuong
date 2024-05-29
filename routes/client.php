<?php

// Website có các trang
    // Trang chu
    // 

// Để định nghĩa đc. Phải tạo controller trc
// Tiếp theo khai báo function tương tự tự để xử lý
// Định nghĩa đường dẫn

// HTTP Method: get, post, put (path), delete, option, head

use Admin\XuongOop\Controllers\Client\AboutController;
use Admin\XuongOop\Controllers\Client\ContactController;
use Admin\XuongOop\Controllers\Client\HomeController;
use Admin\XuongOop\Controllers\Client\ProductController;

$router->get( "/",                  HomeController::class    . '@index');
$router->get( "/about",             AboutController::class   . '@index');

$router->get( "/contact",           ContactController::class . '@index');
$router->post( "/contact/store",    ContactController::class . '@index');

$router->get( "/products",          ProductController::class . '@index');
$router->get( "/products/{id}",     ProductController::class . '@detail');

