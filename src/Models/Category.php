<?php

namespace Admin\XuongOop\Models;

use Admin\XuongOop\Commons\Model;

class Category extends Model
{
    protected string $tableName = 'categories';

    public function uniqueCategory($categoryName)
    {
        return $this->queryBuilder
               ->select('*')
               ->from($this->tableName)
               ->where('category_name = ?')
               ->setParameter(0, $categoryName)
               ->fetchAssociative();
    }

    public function allDel()
    {
        return $this->queryBuilder
        ->select('*')
        ->from($this->tableName)
        ->where('active = ?')
        ->setParameter(0, 0)
        ->fetchAllAssociative();
    }

}