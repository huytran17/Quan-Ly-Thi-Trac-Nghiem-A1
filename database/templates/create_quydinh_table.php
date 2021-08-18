<?php
include_once APP_PATH . '/libs/Database.php';

class QuyDinhTable extends Database
{
    public function create()
    {
        $sql = "
            CREATE TABLE quydinh (
                id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL COMMENT 'Khóa chính',
                tenquydinh varchar(100) NOT NULL COMMENT 'Tên quy định',
                noidung longtext NOT NULL COMMENT 'Nội dung'
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";

        $this->_mysqli->query($sql);
    }

    public function drop()
    {
        $sql = "
            DROP TABLE IF EXISTS `quydinh`
        ";

        $this->_mysqli->query($sql);
    }
}
