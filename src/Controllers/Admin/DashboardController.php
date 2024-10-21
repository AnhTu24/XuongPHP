<?php

namespace Phucle\Assignment\Controllers\Admin;

use Phucle\Assignment\Commons\Controller;
use Phucle\Assignment\Commons\Helper;
use Phucle\Assignment\Models\News;

class DashboardController extends Controller 
{
    private News $news;

    public function __construct()
    {
        $this->news = new News();
    }

    public function dashboard() {    
        $news = $this->news->all();

        $analysisProduct = array_map(function ($item) {
            return [
                $item['tenDanhMuc'],
                $item['analys_post']
                           
            ];
        }, $news);
    //    Helper::debug($analysisProduct);die;

        array_unshift($analysisProduct, ['Danh mục', 'Số bài viết']);

        $this->renderViewAdmin(__FUNCTION__, [
            'analysisProduct' => $analysisProduct
        ]);
    }
}
