<?php

namespace Admin\XuongOop\Commons;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;

class Model
{
    protected Connection|null $conn;

    protected $queryBuilder;
    public function __construct()
    {
        // Thực hiện kết nối khi khởi tạo bất kỳ
        // đối tượng nào liên quan đến model
        $connectionParams = [
            'dbname'   => $_ENV['DB_NAME'],
            'user'     => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
            'host'     => $_ENV['DB_HOST'],
            'port'     => $_ENV['DB_PORT'],
            'driver'   => $_ENV['DB_DRIVER'],
        ];
        $this->conn = DriverManager::getConnection($connectionParams);

        $this->queryBuilder = $this->conn->createQueryBuilder();
    }

    // CRUD
    protected function all()
    {
        return $this->queryBuilder->select('*')->fetchAllAssociative();
    }

    protected function paginate($page, $perPage = 10 )
    {

    }

    protected function findById($id)
    {

    }

    protected function insert()
    {

    }

    protected function update()
    {

    }

    protected function delete()
    {

    }
    public function __destruct()
    {
        $this->conn = null;
    }
}