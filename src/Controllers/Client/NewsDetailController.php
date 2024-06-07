<?php

namespace Admin\XuongOop\Controllers\Client;

use Admin\XuongOop\Commons\Controller;
use Admin\XuongOop\Commons\Helper;
use Admin\XuongOop\Models\Category;
use Admin\XuongOop\Models\News;


class NewsDetailController extends Controller
{
    private News $news;
    private Category $category;
    public function __construct()
    {
        $this->news = new News();
        $this->category = new Category();
    }
    public function showNews($id)
    {
        $categories = $this->category->all();
        $news = $this->news->showById($id);
        
        $date = date('d F Y', strtotime($news['created_at']));

        $this->renderViewClient("news_detail", [
            "news"       => $news,
            "date"       => $date,
            'categories' => $categories
        ]);
    }
}
