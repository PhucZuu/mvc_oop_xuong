<?php

namespace Admin\XuongOop\Controllers\Client;

use Admin\XuongOop\Commons\Controller;
use Admin\XuongOop\Commons\Helper;
use Admin\XuongOop\Models\Category;
use Admin\XuongOop\Models\News;
use Admin\XuongOop\Models\User;

class HomeController extends Controller
{
    private News $news;
    private Category $category;

    public function __construct()
    {
        $this->news = new News();
        $this->category = new Category();
    }
    public function index()
    {
        $categories = $this->category->all();

        
        
        $topNews = (new News)->topNews();
        
        [$news, $page ,$totalPage] = $this->news->paginate($_GET['page'] ?? 1);
        
        
        $this->renderViewClient('home', [
            'news'      => $news,
            'totalPage' => $totalPage,
            'page'      => $page,
            'categories'=> $categories,
            'topNews'   => $topNews
        ]);
    }


}