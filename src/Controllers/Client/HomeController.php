<?php

namespace Admin\XuongOop\Controllers\Client;

use Admin\XuongOop\Commons\Controller;
use Admin\XuongOop\Commons\Helper;
use Admin\XuongOop\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $user = new User();
        Helper::debug($user);

        $name = 'Phuc';
        $this->renderViewClient('home', [
            'name' => $name
        ]);
    }
}