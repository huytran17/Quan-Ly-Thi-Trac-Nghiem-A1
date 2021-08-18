<?php
include_once APP_PATH . '/libs/Database.php';

class BienBanTable extends Database
{
    public function create()
    {
        $sql = "
            CREATE TABLE bienban (
                id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL COMMENT 'Khóa chính',
                thisinh_id int(11) NOT NULL COMMENT 'Khóa ngoại bảng ThiSinh',
                tieude varchar(100) NOT NULL COMMENT 'Tiêu đề biên bản',
                noidung longtext NOT NULL COMMENT 'Nội dung biên bản',
                CONSTRAINT FK_bienban_thisinhid FOREIGN KEY (thisinh_id) REFERENCES thisinh(id) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";

        $this->_mysqli->query($sql);
    }

    public function drop()
    {
        $sql = "
            DROP TABLE IF EXISTS `bienban`
        ";

        $this->_mysqli->query($sql);
    }
}
