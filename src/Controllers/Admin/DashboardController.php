<?php

namespace Admin\XuongOop\Controllers\Admin;

use Admin\XuongOop\Commons\Controller;
use Admin\XuongOop\Commons\Helper;
use Admin\XuongOop\Models\Statistic;

class DashboardController extends Controller
{
    private Statistic $statistic;
    public function __construct()
    {
        $this->statistic = new Statistic();
    }
    public function dashboard()
    {
        $data = $this->statistic->statisticNewsByCategory();

        
        $analyticsNews = array_map(function ($item) {
            return [
                $item['category_name'],
                $item['quantityRecord']
            ];
        }, $data);
        array_unshift($analyticsNews, ['Tên danh mục', 'Số lượng tin tức']);

        $this->renderViewAdmin(__FUNCTION__, [
            "analyticsNews"=> $analyticsNews
        ]);
    }
}