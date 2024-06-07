<?php

namespace Admin\XuongOop\Models;

use Admin\XuongOop\Commons\Model;

class Status extends Model
{
    protected string $tableName = 'status';

    public function all()
    {
        return $this->queryBuilder
        ->select('*')
        ->from($this->tableName)
        ->orderBy('id','desc')
        ->fetchAllAssociative();
    }
}