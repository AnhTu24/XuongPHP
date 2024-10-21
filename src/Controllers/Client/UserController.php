<?php

namespace Phucle\Assignment\Controllers\Client;

use Phucle\Assignment\Commons\Controller;
use Phucle\Assignment\Models\User;
use Rakit\Validation\Validator;

class UserController extends Controller
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function edit($idNguoiDung)
    {
        session_start();
        if (isset($_SESSION['user'])) {
            $userId = $_SESSION['user'];

            if ($userId == $idNguoiDung) {
                $user = $this->user->findByidNguoiDung($idNguoiDung);

                $this->renderViewClient('edit', [
                    'user' => $user
                ]);
            }
        }
    }

    public function update($idNguoiDung)
    {
        $user = $this->user->findByidNguoiDung($idNguoiDung);

        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'email' => 'required|email',
            'matKhau' => 'min:6',
            'hinhAnh' => 'uploaded_file:0,2048K,png,jpg,jpeg',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('/editUse'));
            exit;
        } else {
            $data = [
                'email' => $_POST['email'],
                'matKhau' => !empty($_POST['matKhau'])
                    ? password_hash($_POST['matKhau'], PASSWORD_DEFAULT) : $user['matKhau'],
            ];

            $flagUpload = false;
            if (isset($_FILES['hinhAnh']) && $_FILES['hinhAnh']['size'] > 0) {

                $flagUpload = true;

                $from = $_FILES['hinhAnh']['tmp_name'];
                $to = '/uploads/' . time() . $_FILES['hinhAnh']['name'];

                if (move_uploaded_file($from, PATH_ASSET . $to)) {
                    $data['hinhAnh'] = $to;
                } else {
                    $_SESSION['errors']['hinhAnh'] = 'Upload Không thành công';

                    header('Location: ' . url('editUser'));
                    exit;
                }
            }

            $this->user->update($idNguoiDung, $data);

            if (
                $flagUpload
                && $user['hinhAnh']
                && file_exists(PATH_ASSET . $user['hinhAnh'])
            ) {
                unlink(PATH_ASSET . $user['hinhAnh']);
            }

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location: ' . url("editUse"));
            exit;
        }
    }

}