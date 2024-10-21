<?php
namespace Phucle\Assignment\Controllers\Client;

use Exception;
use Phucle\Assignment\Commons\Controller;
use Phucle\Assignment\Commons\Helper;
use Phucle\Assignment\Models\User;
use Rakit\Validation\Validator;

class Login_registerController extends Controller
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }


    public function showFromRegister()
    {
        $this->renderViewClient('register');
    }

    public function register()
    {
        $validator = new Validator();

        $validation = $validator->make($_POST + $_FILES, [
            'tenDangNhap' => 'required|max:50',
            'email' => 'required|email',
            'matKhau' => 'required|min:5',
            'confirm_matKhau' => 'required|same:matKhau',

        ]);
        $validation->validate();


        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('register'));
            exit;
        } else {
            $data = [
                'tenDangNhap' => $_POST['tenDangNhap'],
                'email' => $_POST['email'],
                'matKhau' => password_hash($_POST['matKhau'], PASSWORD_DEFAULT),
            ];

            $this->user->insert($data);
            header('Location: ' . url(''));
            exit;
        }
    }

    public function showFromLogin()
    {
        auth_check();
        $this->renderViewClient('login');
    }

    public function login() {
        auth_check();

        try {
            $user = $this->user->findBytenDangNhap($_POST['tenDangNhap']);

            if (empty($user)) {
                throw new Exception('Không tồn tại tên đăng nhập: ' . $_POST['tenDangNhap']);
            }

            $flag = password_verify($_POST['matKhau'], $user['matKhau']); 
            if ($flag) {

                $_SESSION['user'] = $user;

               

                if ($user['vaiTro'] == 'admin') {
                    header('Location: ' . url('admin/') );
                    exit;
                }

                header('Location: ' . url() );
                exit;
            }

            throw new Exception('Password không đúng');
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th->getMessage();

            header('Location: ' . url('login') );
            exit;
        }
    }

    public function logout()
    {

        unset($_SESSION['user']);
        header('Location: ' . url(''));
        exit;
    }
}

