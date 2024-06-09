<?php

namespace Admin\XuongOop\Models;

use Admin\XuongOop\Commons\Model;

class Statistic extends Model
{
    public function statisticNewsByCategory()
    {
        return $this->queryBuilder
        ->select('c.category_name', 'COUNT("n.*") as quantityRecord')
        ->from('news','n')
        ->innerJoin('n','categories','c','n.category_id = c.id')
        ->where('n.active = ?')
        ->setParameter(0, 1)
        ->andWhere('c.active = ?')
        ->setParameter(1, 1)
        ->groupBy('c.category_name')
        ->orderBy('quantityRecord','desc')
        ->fetchAllAssociative();
    }

}