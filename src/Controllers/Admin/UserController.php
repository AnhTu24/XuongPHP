<?php

namespace Phucle\Assignment\Controllers\Admin;

use Phucle\Assignment\Commons\Controller;
use Phucle\Assignment\Commons\Helper;
use Phucle\Assignment\Models\User;
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
            'users' => $users,
            'totalPage' => $totalPage
        ]);
    }

    public function restore()
    {
        $users = $this->user->restore();

        $this->renderViewAdmin('users.restore',[
            'users' => $users
        ]);
    }

    public function show($idNguoiDung)
    {
        $user = $this->user->findByidNguoiDung($idNguoiDung);

        $this->renderViewAdmin('users.show', [
            'user' => $user
        ]);
    }

    public function edit($idNguoiDung)
    {
        $user = $this->user->findByidNguoiDung($idNguoiDung);

        $this->renderViewAdmin('users.edit', [
            'user' => $user
        ]);
    }

    public function update($idNguoiDung)
    {
        $this->user->findByidNguoiDung($idNguoiDung);


        $this->user->update($idNguoiDung, [
            'vaiTro' => $_POST['vaiTro'],
            
        ]);


        $_SESSION['status'] = true;
        $_SESSION['msg'] = 'Thao tác thành công';

        // Chuyển hướng sau khi cập nhật
        header('Location: ' . url("admin/users/{$idNguoiDung}/edit"));
        exit;
    }


    public function delete($idNguoiDung)
    {
        try {

            $user = $this->user->findByidNguoiDung($idNguoiDung);

            $this->user->update($idNguoiDung, [
                'kichHoat' => 0
            ]);


            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';

        } catch (\Throwable $th) {

            $_SESSION['status'] = false;
            $_SESSION['msg'] = 'Thao tác KHÔNG thành công!';
        }

        header('Location: ' . url('admin/users'));
        exit();
    }

    public function update_restore($idNguoiDung)
    {
        try {

            $this->user->update($idNguoiDung, [
                'kichHoat' => 1
            ]);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';

        } catch (\Throwable $th) {

            $_SESSION['status'] = false;
            $_SESSION['msg'] = 'Thao tác KHÔNG thành công!';
        }

        header('Location: ' . url('admin/users'));
        exit();

    }

    public function logout()
    {

        unset($_SESSION['user']);
        header('Location: ' . url('/'));
        exit;
    }
}
