<?php
include_once APP_PATH . '/libs/Database.php';

class BaoCaoTable extends Database
{
    public function create()
    {
        $sql = "
            CREATE TABLE IF NOT EXISTS baocao (
                id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL COMMENT 'Khóa chính',
                thisinh_id int(11) NOT NULL COMMENT 'Khóa ngoại bảng ThiSinh',
                ketquathi text NOT NULL COMMENT 'Kết quả thi',
                CONSTRAINT FK_baocao_thisinhid FOREIGN KEY (thisinh_id) REFERENCES thisinh(id) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";

        $this->_mysqli->query($sql);
    }

    public function drop()
    {
        $sql = "
            DROP TABLE IF EXISTS `baocao`
        ";

        $this->_mysqli->query($sql);
    }
}
