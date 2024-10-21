<?php

namespace Phucle\Assignment\Controllers\Admin;

use Phucle\Assignment\Commons\Controller;
use Phucle\Assignment\Commons\Helper;
use Phucle\Assignment\Models\News;
use Rakit\Validation\Validator;

class NewsController extends Controller
{
    private News $news;

    public function __construct()
    {
        $this->news = new News();
    }

    public function index()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 5;

       $result = $this->news->paginate($_GET['page'] ?? 1);
        $this->renderViewAdmin('news.index', [
            'news' => $result['data'],
            'totalPage' => $result['totalPage'],
            'currentPage' => $result['currentPage'],
            'totalRecords' => $result['totalRecords']
        ]);
    }

    public function create()
    {
        $lists = $this->news->allDanhMuc();
        $this->renderViewAdmin('news.create', [
            'lists' => $lists

        ]);

    }

    public function store()
    {
        $validator = new Validator();

        $validation = $validator->make($_POST + $_FILES, [
            'tieuDe' => 'required|max:100',
            'moTa' => 'required',
            'noiDung' => 'required',
            'hinhAnh' => 'uploaded_file:0,2048K,png,jpg,jpeg',

        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            header('Location: ' . url('admin/news/create'));
            exit;

        } else {
            $data = [
                'tieuDe' => $_POST['tieuDe'],
                'moTa' => $_POST['moTa'],
                'noiDung' => $_POST['noiDung'],
                'danhMucId' => $_POST['idDanhMuc'],
            ];

            if (isset($_FILES['hinhAnh']) && $_FILES['hinhAnh']['size'] > 0) {
                $form = $_FILES['hinhAnh']['tmp_name'];
                $to = '/uploads/' . time() . $_FILES['hinhAnh']['name'];

                if (move_uploaded_file($form, PATH_ASSET . $to)) {
                    $data['hinhAnh'] = $to;
                } else {
                    $_SESSION['errors']['avatar'] = 'Upload Không thành công';
                    header('Location: ' . url('admin/news/create'));
                    exit;
                }
            }

            $this->news->insert($data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location: ' . url('admin/news'));
            exit;
        }
    }

    public function show($id)
    {
        $new = $this->news->findByidTinTuc($id);
        $this->renderViewAdmin('news.show', [
            'new' => $new
        ]);
    }

    public function edit($id)
    {
        $new = $this->news->findByidTinTuc($id);
        $lists = $this->news->allDanhMuc();
        $this->renderViewAdmin('news.edit',[
            'new' => $new,
            'lists' => $lists,
            'checkDanhMuc' => $new['danhMucId']        
            
        ]);
    }

    public function update($id)
    {
        $new = $this->news->findByidTinTuc($id);
        $validator = new Validator();

        $validation = $validator->make($_POST + $_FILES, [
            'tieuDe' => 'required|max:100',
            'moTa' => 'required',
            'noiDung' => 'required',
            'hinhAnh' => 'uploaded_file:0,2048K,png,jpg,jpeg',

        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            header('Location: ' . url('admin/news/edit'));
            exit;

        } else {
            $data = [
                'tieuDe' => $_POST['tieuDe'],
                'moTa' => $_POST['moTa'],
                'noiDung' => $_POST['noiDung'],
                'danhMucId' => $_POST['danhMucId'],
            ];

            $flagUpload = false;
            if (isset($_FILES['hinhAnh']) && $_FILES['hinhAnh']['size'] > 0) {
                $flagUpload = true;

                $form = $_FILES['hinhAnh']['tmp_name'];
                $to = '/uploads/' . time() . $_FILES['hinhAnh']['name'];

                if (move_uploaded_file($form, PATH_ASSET . $to)) {
                    $data['hinhAnh'] = $to;
                } else {
                    $_SESSION['errors']['avatar'] = 'Upload Không thành công';
                    header('Location: ' . url('admin/news/edit'));
                    exit;
                }
            }

            $this->news->update($id, $data);

            if (
                $flagUpload
                && $new['hinhAnh']
                && file_exists(PATH_ASSET . $new['hinhAnh'])
            ) {
                unlink(PATH_ASSET . $new['hinhAnh']);
            }

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location: ' . url('admin/news'));
            exit;
        }
    }

    public function delete($id)
    {
        try {

            $user = $this->news->findByidTinTuc($id);

            $this->news->update($id, [
                'kichHoat' => 0,
                'trangThaiId' => 0,
            ]);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';

        } catch (\Throwable $th) {

            $_SESSION['status'] = false;
            $_SESSION['msg'] = 'Thao tác KHÔNG thành công!';
        }

        header('Location: ' . url('admin/news'));
        exit();
    }

    public function restore()
    {

        $news = $this->news->restore();
        $this->renderViewAdmin('news.restore', [
            'news' => $news
        ]);
    }

    public function update_restore($id)
    {
        try {

            $user = $this->news->findByidTinTuc($id);

            $this->news->update($id, [
                'kichHoat' => 1
            ]);


            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';

        } catch (\Throwable $th) {

            $_SESSION['status'] = false;
            $_SESSION['msg'] = 'Thao tác KHÔNG thành công!';
        }

        header('Location: ' . url('admin/news'));
        exit();
    }

    public function delete_new($id)
    {
        try {

            $new = $this->news->findByidTinTuc($id);

            $this->news->delete($id);

            if (
                $new['avata']
                && file_exists(PATH_ASSET . $new['hinhAnh'])
            ) {
                unlink(PATH_ASSET . $new['hinhAnh']);
            }

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';
        } catch (\Throwable $th) {
            $_SESSION['status'] = false;
            $_SESSION['msg'] = 'Thao tác KHÔNG thành công!';
        }


        header('Location: ' . url('admin/news'));
        exit();
    }

}
