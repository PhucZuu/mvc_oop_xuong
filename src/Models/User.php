<?php

namespace Admin\XuongOop\Models;

use Admin\XuongOop\Commons\Model;

class User extends Model
{
    protected string $tableName = 'users';

    public function findByEmail($email)
    {
        return $this->queryBuilder
        ->select('*')
        ->from($this->tableName)
        ->where('email = ?')
        ->setParameter(0, $email)
        ->fetchAssociative();
    }

    public function paginate($page = 1, $perPage = 5 )
    {
        $queryBuilder = clone($this->queryBuilder);

        $totalPage = ceil($this->count() / $perPage);

        $offset = $perPage * ($page - 1);

        $data = $queryBuilder
        ->select('*')
        ->from($this->tableName)
        ->setFirstResult($offset)
        ->setMaxResults($perPage)
        ->where('active = ?')
        ->setParameter(0, 1)
        ->orderBy('id','desc')
        ->fetchAllAssociative();

        return [$data, $totalPage];
    }

    public function getAllUserBan()
    {
        return $this->queryBuilder
        ->select('*')
        ->from($this->tableName)
        ->where('active = ?')
        ->setParameter(0, 0)
        ->fetchAllAssociative();
    }

}