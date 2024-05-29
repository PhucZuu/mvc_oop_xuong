<?php

namespace Admin\XuongOop\Commons;

class Model
{
    protected $conn;

    public function __construct()
    {
        // Thực hiện kết nối khi khởi tạo bất kỳ
        // đối tượng nào liên quan đến model
    }

    public function __destruct()
    {
        $this->conn = null;
    }
}