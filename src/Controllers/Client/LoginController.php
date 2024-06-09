<?php

namespace Admin\XuongOop\Controllers\Client;

use Admin\XuongOop\Commons\Controller;
use Admin\XuongOop\Commons\Helper;
use Admin\XuongOop\Models\Category;
use Admin\XuongOop\Models\User;
use Rakit\Validation\Validator;

class LoginController extends Controller
{
    private User $user;
    private Category $category;

    public function __construct()
    {
        $this->user = new User();
        $this->category = new Category();
    }

    public function showFormLogin()
    {
        avoid_login();
        $categories = $this->category->all();
        $this->renderViewClient("login", [
            'categories' => $categories
        ]);
    }

    public function login()
    {
        avoid_login();

        try {
            $user = $this->user->findByEmail($_POST['email']);
            if (empty($user)) {
                throw new \Exception('Tài khoản hoặc mật khẩu không chính xác');
            }
            $flag = password_verify($_POST['password'], $user['password']);

            if ($flag) {
                $_SESSION['user'] = $user;
                if ($_SESSION['user']['role'] == 1) {
                    header('Location: ' . url('admin/'));
                    exit;
                }

                header('Location: ' . url());
                exit;
            }
            throw new \Exception('Tài khoản hoặc mật khẩu không chính xác');
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th->getMessage();

            header('Location: ' . url('login'));
            exit;
        }
    }

    public function showFormRegister()
    {
        avoid_login();

        $categories = $this->category->all();

        $this->renderViewClient('register', [
            'categories' => $categories
        ]);
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
        } else {

            $uniqueEmail = $this->user->findByEmail($_POST['email']);

            if (!$uniqueEmail) {

                $data = [
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                ];

                $this->user->insert($data);

                $_SESSION['status'] = true;
                $_SESSION['msg'] = 'Bạn đã đăng ký tài khoản thành công';

                header('Location: ' . url('register'));
                exit();
            } else {

                $_SESSION['errors']['unique'] = "Email đã tồn tại";
                header('Location: ' . url('register'));
                exit();
            }
        }
    }

    public function showAccount()
    {
        if (isset($_SESSION['user'])) {

            $categories = $this->category->all();
            $user = $this->user->findById($_SESSION['user']['id']);

            $this->renderViewClient('editaccount', [
                'user'       => $user,
                'categories' => $categories
            ]);
        } else {

            header('Location: ' . url('login'));
            exit;
        }
    }

    public function saveChangeAccount($id)
    {

        $user = $this->user->findById($id);

        $validator = new Validator();

        $validator->setMessages([
            'required'      => ':attribute không được để trống',
            'max'           => ':attribute không được quá 50 ký tự',
            'min'           => ':attribute quá ngắn',
            'uploaded_file' => 'Chọn file ảnh và ảnh kích cỡ dưới 2MB'
        ]);

        $validation = $validator->make($_POST + $_FILES, [
            'name'      => 'required|max:50',
            'email'     => 'required|email',
            'password'  => 'min:6',
            'avatar'    => 'uploaded_file:0,2M,png,jpg,jpeg'
        ]);

        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url("{$id}/myaccount"));
            exit;
        } else {
            if ($_POST['email'] == $user['email']) {

                $uniqueEmail = false;
            } else {

                $uniqueEmail = (new User)->findByEmail($_POST['email']);
            }

            // check unique email
            if (!$uniqueEmail) {
                $data = [
                    'name'       => $_POST['name'],
                    'email'      => $_POST['email'],
                    'password'   => !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $user['password'],
                    'updated_at' => date("Y-m-d h:i:s")
                ];



                $flagUpload = false;
                // check upload file
                if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {
                    $flagUpload = true;

                    $from = $_FILES['avatar']['tmp_name'];
                    $to = 'assets/uploads/' . time() . $_FILES['avatar']['name'];

                    if (move_uploaded_file($from, PATH_ROOT . $to)) {

                        $data['avatar'] = $to;
                    } else {

                        $_SESSION['errors']['avatar'] = 'Upload không thành công';

                        header('Location: ' . url("{$id}/myaccount"));
                        exit;
                    }
                }

                $this->user->update($id, $data);

                // check exists file in uploads folder
                if (
                    $flagUpload &&
                    $user['avatar'] &&
                    file_exists(PATH_ROOT . $user['avatar'])
                ) {
                    unlink(PATH_ROOT . $user['avatar']);
                }

                if (isset($_POST['password']) && $_POST['password']) {
                    unset($_SESSION['user']);
                    $_SESSION['error'] = "Vui lòng đăng nhập lại";
                    unset($_SESSION['errors']);
                    header('Location: ' . url('login'));
                    exit;
                }

                // update SESSION
                unset($_SESSION['user']);
                $userUpdate = (new User)->findById($id);
                $_SESSION['user'] = $userUpdate;

                $_SESSION['status'] = true;
                $_SESSION['msg'] = 'Thay đổi thông tin thành công';

                header('Location: ' . url("{$id}/myaccount"));
                exit;
            } else {
                $_SESSION['errors']['email'] = "Email đã tồn tại";

                header('Location: ' . url("{$id}/myaccount"));
                exit;
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
