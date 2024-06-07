<?php

namespace Admin\XuongOop\Controllers\Client;

use Admin\XuongOop\Commons\Controller;
use Admin\XuongOop\Commons\Helper;
use Admin\XuongOop\Models\User;
use Rakit\Validation\Validator;

class LoginController extends Controller
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function showFormLogin()
    {
        avoid_login();

        $this->renderViewClient("login");
    }

    public function login()
    {
        avoid_login();

        try {
            $user = $this->user->findByEmail($_POST['email']);
            if(empty($user)) 
            {
                throw new \Exception('Tài khoản hoặc mật khẩu không chính xác');
            }
            $flag = password_verify($_POST['password'], $user['password']);

            if ($flag) 
            {
                $_SESSION['user'] = $user;
                if($_SESSION['user']['role'] == 1){
                    header('Location: ' . url('admin/'));
                    exit;
                }

                header('Location: ' . url());
                exit;
            }
            throw new \Exception('Tài khoản hoặc mật khẩu không chính xác');
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th->getMessage();

            header('Location: '. url('login'));
            exit;
        }
    }

    public function showFormRegister()
    {
        $this->renderViewClient('register');
    }

    public function register()
    {   
        $validator = new Validator;
        $validator->setMessages([
            'required'   => ':attribute không được để trống',
            'email'      => 'Email không hợp lệ',
            'min'        => ':attribute phải có ít nhất 6 ký tự',
            'same'       => ':attribute không chính xác'
        ]);
        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required',
            'email'                 => 'required|email',
            'password'              => 'required|min:6',
            'confirm_password'      => 'required|same:password',
        ]);

        $validation->validate();
        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('register'));
            exit();
        }else{
            $uniqueEmail = $this->user->findByEmail($_POST['email']);
            if(!$uniqueEmail){
                $data = [
                    'name'=> $_POST['name'],
                    'email'=> $_POST['email'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                ];
    
                $this->user->insert($data);
                $_SESSION['status'] = true;
                $_SESSION['msg'] = 'Bạn đã đăng ký tài khoản thành công';
                header('Location: ' . url('register'));
                exit();
            }else{
                $_SESSION['errors']['unique'] = "Email đã tồn tại";
                header('Location: ' . url('register'));
                exit();
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header("Location: " . url());
        exit;
    }
}
