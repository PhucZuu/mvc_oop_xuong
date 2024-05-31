<?php

namespace Admin\XuongOop\Controllers\Admin;

use Admin\XuongOop\Commons\Controller;
use Admin\XuongOop\Commons\Helper;
use Admin\XuongOop\Models\User;


class UserController extends Controller
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }
    public function index()
    {
        [$users, $totalPage] = $this->user->paginate($_GET['page'] ?? 1);
        
        $this->renderViewAdmin('users.index', [
            'users'=> $users,
            'totalPage'=> $totalPage
        ]);
    }

    public function store()
    {
        echo __CLASS__ . "@" . __FUNCTION__;
    }

    public function create()
    {
        echo __CLASS__ . "@" . __FUNCTION__;
    }

    public function show($id)
    {
        echo __CLASS__ . "@" . __FUNCTION__ . ' - ID = ' . $id;
    }

    public function edit($id)
    {
        echo __CLASS__ . "@" . __FUNCTION__ . ' - ID = ' . $id;
    }

    public function update($id)
    {
        echo __CLASS__ . "@" . __FUNCTION__ . ' - ID = ' . $id;
    }

    public function delete($id)
    {
        $this->user->delete($id);

        header('Location: ' . url('admin/users'));
        exit();
    }
}
