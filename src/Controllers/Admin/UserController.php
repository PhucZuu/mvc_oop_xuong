<?php

namespace Admin\XuongOop\Controllers\Admin;

use Admin\XuongOop\Commons\Controller;
use Admin\XuongOop\Commons\Helper;
use Admin\XuongOop\Models\User;
use Rakit\Validation\Validator;


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


    public function show($id)
    {
        $user = $this->user->findById($id);

        $this->renderViewAdmin('users.show',[
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        $user = $this->user->findById($id);
        $this->renderViewAdmin('users.edit',[
            'user'=> $user
        ]);
    }

    public function update($id)
    {
        $this->user->update($id, [
            'role'=> $_POST['role'],
        ]);
        $_SESSION['status'] = true;
        $_SESSION['msg'] = 'Thao tác thành công';
        header('Location: '. url('admin/users'));
        exit();
        
    }

    public function banAcc($id)
    {
        $this->user->update($id, [
            'active' => 0
        ]);

        $_SESSION['status'] = true;
        $_SESSION['msg'] = 'Thao tác thành công';
        header('Location: '. url('admin/users'));
        exit();
    }
    public function delete($id)
    {

        $this->user->delete($id);

        $_SESSION['status'] = true;
        $_SESSION['msg'] = 'Thao tác thành công';
        header('Location: '. url('admin/users/listBanned'));
        exit();
    }

    public function viewAccBanned()
    {
        $users = $this->user->getAllUserBan();
        $this->renderViewAdmin('users.index', [
            'users'=> $users
        ]);
    }

    public function restore($id)
    {
        $this->user->update($id, [
            'active' => 1
        ]);

        $_SESSION['status'] = true;
        $_SESSION['msg'] = 'Khôi phục thành công';
        header('Location: '. url('admin/users/listBanned'));
        exit();
    }
}
