<?php

namespace Phucle\Assignment\Controllers\Client;

use Phucle\Assignment\Commons\Controller;
use Phucle\Assignment\Commons\Helper;
use Phucle\Assignment\Models\News;
use Phucle\Assignment\Models\User;

class HomeController extends Controller
{
    private News $news;
    private User $user;

    public function __construct()
    {
        $this->news = new News();
    }

    public function home()
    {
       
        $top = new News();
        $top5News = $top->top5();
   
        $lists = $this->news->allDanhMuc();
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $perPage = 3;

        $result = $this->news->paginate($_GET['page'] ?? 1);


        $this->renderViewClient('home', [
            'news' => $result['data'],
            'lists' => $lists,
            'top5News' => $top5News,
            'totalPage' => $result['totalPage'],
            'currentPage' => $result['currentPage'],
            'totalRecords' => $result['totalRecords']

        ]);
    }

    public function loadList($tenDanhMuc)
    {     
        $top = new News();
        $top5News = $top->top5();

        $lists = $this->news->allDanhMuc();
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $perPage = 4;

        $result = $this->news->loadNewsTheoDanhMuc($tenDanhMuc, $page, $perPage);

        $this->renderViewClient('home', [
            'news' => $result['data'],
            'lists' => $lists,
            'totalPage' => $result['totalPage'],
            'currentPage' => $result['currentPage'],
            'totalRecords' => $result['totalRecords'],
            'top5News' => $top5News
           

        ]);
    }

    public function newDetail($id)
    {
        $lists = $this->news->allDanhMuc();
        $new = $this->news->findByidTinTuc($id);
        $views = $this->news->incViews($id);
        $this->renderViewClient('newDetail', [

            'new' => $new,
            'lists' => $lists,

        ]);
    }

    public function searchNews()
    {
        $lists = $this->news->allDanhMuc();
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $perPage = 9; // Or any desired number of products per page
        $word = $_POST['word'] ?? '';
        $result = $this->news->paginateSearch($word, $page, $perPage);

        $this->renderViewClient('search', [
            'lists' => $lists,
            'news' => $result['data'],
            'word' => $word,
            'totalPage' => $result['totalPage'],
            'currentPage' => $result['currentPage'],
            'totalRecords' => $result['totalRecords']
        ]);
    }

}

