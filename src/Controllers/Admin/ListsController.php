<?php

namespace Phucle\Assignment\Controllers\Admin;

use Exception;
use Phucle\Assignment\Commons\Controller;
use Phucle\Assignment\Commons\Helper;
use Phucle\Assignment\Models\Lists;
use Rakit\Validation\Validator;

class ListsController extends Controller
{
    private Lists $lists;

    public function __construct()
    {
        $this->lists = new Lists();

    }

    public function index()
    {
        [$lists, $totalPage] = $this->lists->paginate($_GET['page'] ?? 1);

        $this->renderViewAdmin('lists.index', [
            'lists' => $lists,
            'totalPage' => $totalPage
        ]);
    }

    public function create()
    {
        $this->renderViewAdmin('lists.create');
    }

    public function store()
    {
        // VALIDATE
        $validator = new Validator;

        $validation = $validator->make($_POST + $_FILES, [

            'tenDanhMuc' => 'required|max:30',

        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            header('Location: ' . url('admin/lists/create'));
            exit;
        } else {
            $this->lists->insert([
                'tenDanhMuc' => $_POST['tenDanhMuc'],
            ]);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';
            header('Location: ' . url('admin/lists/'));
            exit;
        }
    }

    public function show($id)
    {
        $list = $this->lists->findByidDanhMuc($id);
        $this->renderViewAdmin('lists.show', [
            'list' => $list
        ]);
    }

    public function edit($id)
    {
        try {
            //code...
            $list = $this->lists->findByidDanhMuc($id);

            if (empty($list)) {
                throw new Exception('Model not found');
            }

            $this->renderViewAdmin('lists.edit', [
                'list' => $list
            ]);

        } catch (\Throwable $th) {
            //throw $th;
            echo "404 - Not found";
        }
    }

    public function update($id)
    {
        $list = $this->lists->findByidDanhMuc($id);

        // VALIDATE
        $validator = new Validator;

        $validation = $validator->make($_POST + $_FILES, [

            'tenDanhMuc' => 'required|max:30',

        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            header('Location: ' . url('admin/lists/edit' . $id));
            exit;
        } else {
            $data = [
                'tenDanhMuc' => $_POST['tenDanhMuc'],

            ];

            $this->lists->update($id, $data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';
            header('Location: ' . url('admin/lists/'));
            exit;
        }
    }

    public function delete($id)
    {
        try {

            $user = $this->lists->findByidDanhMuc($id);

            $this->lists->update($id, [
                'kichHoat' => 0
            ]);


            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';

        } catch (\Throwable $th) {

            $_SESSION['status'] = false;
            $_SESSION['msg'] = 'Thao tác KHÔNG thành công!';
        }

        header('Location: ' . url('admin/lists'));
        exit();
    }

    public function restore()
    {

        $lists = $this->lists->restore();
        $this->renderViewAdmin('lists.restore', [
            'lists' => $lists
        ]);
    }

    public function update_restore($id)
    {
        try {

            $user = $this->lists->findByidDanhMuc($id);

            $this->lists->update($id, [
                'kichHoat' => 1
            ]);


            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';

        } catch (\Throwable $th) {

            $_SESSION['status'] = false;
            $_SESSION['msg'] = 'Thao tác KHÔNG thành công!';
        }

        header('Location: ' . url('admin/lists'));
        exit();
    }
}