<?php

namespace Admin\XuongOop\Models;

use Admin\XuongOop\Commons\Model;

class News extends Model
{
    protected string $tableName = "news";

    public function all()
    {
        return $this->queryBuilder
            ->select(
                'n.id',
                'n.title',
                'n.news_image',
                'n.description',
                'n.content',
                'u.name',
                'c.category_name',
                'n.view',
                's.name_status',
                'n.created_at',
                'n.active'
            )
            ->from($this->tableName, 'n')
            ->innerJoin('n', 'categories', 'c', 'n.category_id = c.id')
            ->innerJoin('n', 'users', 'u', 'n.author_id = u.id')
            ->innerJoin('n', 'status', 's', 'n.status_id = s.id')
            ->where('n.active = ?')
            ->setParameter(0, 1)
            ->orderBy('id', 'desc')
            ->fetchAllAssociative();
    }

    public function showById($id)
    {
        return $this->queryBuilder
            ->select(
                'n.id',
                'n.title',
                'n.news_image as image',
                'n.description',
                'n.content',
                'u.name as author',
                'u.avatar',
                'c.category_name as category',
                'n.view',
                's.name_status as status',
                'n.created_at',
                'n.active'
            )
            ->from($this->tableName, 'n')
            ->innerJoin('n', 'categories', 'c', 'n.category_id = c.id')
            ->innerJoin('n', 'users', 'u', 'n.author_id = u.id')
            ->innerJoin('n', 'status', 's', 'n.status_id = s.id')
            ->where('n.active = ?')
            ->setParameter(0, 1)
            ->andWhere('n.id = ?')
            ->setParameter(1, $id)
            ->fetchAssociative();
    }

    public function paginate($page = 1, $perPage = 5)
    {
        $queryBuilder = clone ($this->queryBuilder);

        $totalPage = ceil($this->count() / $perPage);

        $offset = $perPage * ($page - 1);

        $data = $queryBuilder
            ->select(
                'n.id',
                'n.title',
                'n.news_image as image',
                'n.description',
                'n.content',
                'u.name as author',
                'c.category_name as category',
                'n.view',
                's.name_status as status',
                'n.status_id',
                'n.created_at',
                'n.active'
            )
            ->from($this->tableName, 'n')
            ->setFirstResult($offset)
            ->setMaxResults($perPage)
            ->innerJoin('n', 'categories', 'c', 'n.category_id = c.id')
            ->innerJoin('n', 'users', 'u', 'n.author_id = u.id')
            ->innerJoin('n', 'status', 's', 'n.status_id = s.id')
            ->where('n.active = ?')
            ->setParameter(0, 1)
            ->andWhere('n.status_id = ?')
            ->setParameter(1, 1)
            ->orderBy('id', 'desc')
            ->fetchAllAssociative();

        return [$data, $page, $totalPage];
    }

    public function topNews()
    {
        $data = $this->queryBuilder
            ->select('n.id, n.title', 'n.view', 'c.category_name')
            ->from($this->tableName, 'n')
            ->setFirstResult(0)
            ->setMaxResults(5)
            ->innerJoin('n', 'categories', 'c', 'n.category_id = c.id')
            ->where('n.active = ?')
            ->setParameter(0, 1)
            ->orderBy('n.view', 'desc')
            ->fetchAllAssociative();

        return $data;
    }

    public function updateViewsNews($id)
    {
        $this->queryBuilder->update('news')
            ->set('view', 'view + 1')
            ->where('id = ?')
            ->setParameter(0, $id)
            ->executeQuery();

        return true;
    }

    public function searchNews($keyword)
    {
        return $this->queryBuilder
        ->select(
            'n.id',
            'n.title',
            'n.news_image',
            'n.description',
            'u.name as author',
            'c.category_name',
            'n.created_at',
        )
        ->from($this->tableName, 'n')
        ->innerJoin('n', 'categories', 'c', 'n.category_id = c.id')
        ->innerJoin('n', 'users', 'u', 'n.author_id = u.id')
        ->where('n.active = ?')
        ->setParameter(0, 1)
        ->andWhere("n.title LIKE '%$keyword%'")
        ->orderBy('id', 'desc')
        ->fetchAllAssociative();
    }

    public function paginateListNews($page = 1, $perPage = 9)
    {
        $queryBuilder = clone ($this->queryBuilder);

        $totalPage = ceil($this->count() / $perPage);

        $offset = $perPage * ($page - 1);

        $data = $queryBuilder
            ->select(
                'n.id',
                'n.title',
                'n.news_image as image',
                'u.name as author',
                'c.category_name as category',
                'n.view',
                'n.created_at',
                'n.active'
            )
            ->from($this->tableName, 'n')
            ->setFirstResult($offset)
            ->setMaxResults($perPage)
            ->innerJoin('n', 'categories', 'c', 'n.category_id = c.id')
            ->innerJoin('n', 'users', 'u', 'n.author_id = u.id')
            ->where('n.active = ?')
            ->setParameter(0, 1)
            ->andWhere('n.status_id = ?')
            ->setParameter(1, 1)
            ->orderBy('id', 'desc')
            ->fetchAllAssociative();

        return [$data, $page, $totalPage];
    }

    public function paginateListNewsByCategory($page = 1, $perPage = 9, $id_category = null)
    {
        $queryBuilder = clone ($this->queryBuilder);

        $totalPage = ceil($this->count() / $perPage);

        $offset = $perPage * ($page - 1);

        $data = $queryBuilder
            ->select(
                'n.id',
                'n.title',
                'n.news_image as image',
                'u.name as author',
                'c.category_name as category',
                'n.view',
                'n.created_at',
                'n.active'
            )
            ->from($this->tableName, 'n')
            ->setFirstResult($offset)
            ->setMaxResults($perPage)
            ->innerJoin('n', 'categories', 'c', 'n.category_id = c.id')
            ->innerJoin('n', 'users', 'u', 'n.author_id = u.id')
            ->where('n.active = ?')
            ->setParameter(0, 1)
            ->andWhere('n.status_id = ?')
            ->setParameter(1, 1)
            ->andWhere('n.category_id = ?')
            ->setParameter(2, $id_category)
            ->orderBy('id', 'desc')
            ->fetchAllAssociative();

        return [$data, $page, $totalPage];
    }
}
