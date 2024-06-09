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

        [$news, $page, $totalPage] = $this->news->paginate($_GET['page'] ?? 1);

        $this->renderViewClient('home', [
            'news'       => $news,
            'totalPage'  => $totalPage,
            'page'       => $page,
            'categories' => $categories,
            'topNews'    => $topNews
        ]);
    }

    public function listNewsPage()
    {
        $categories = $this->category->all();

        $topNews = (new News)->topNews();

        [$news, $page, $totalPage] = $this->news->paginate($_GET['page'] ?? 1);

        $this->renderViewClient('listnews', [
            'news'       => $news,
            'totalPage'  => $totalPage,
            'page'       => $page,
            'categories' => $categories,
            'topNews'    => $topNews
        ]);
    }

    public function searchNews()
    {
        $keyword = $_POST['search'];
        $news = $this->news->searchNews($keyword);

        $this->renderViewClient('searchresult', [
            'news'    => $news,
            'keyword' => $keyword
        ]);
    }

    public function allNews()
    {
        $categories = $this->category->all();

        [$news, $page, $totalPage] = $this->news->paginate($_GET['page'] ?? 1, 9);


        $this->renderViewClient('allnews', [
            'categories'  => $categories,
            'news'        => $news,
            'page'        => $page,
            'totalPage'   => $totalPage
        ]);
    }

    public function allNewsByCategory($id)
    {
        $categories = $this->category->all();
        [$news, $page, $totalPage] = $this->news->paginateListNewsByCategory($_GET['page'] ?? 1, 9, $id);
        $id_category= $id;

        $this->renderViewClient('allnews', [
            'categories'  => $categories,
            'news'        => $news,
            'page'        => $page,
            'totalPage'   => $totalPage,
            'id_category' => $id_category
        ]);
    }
}
