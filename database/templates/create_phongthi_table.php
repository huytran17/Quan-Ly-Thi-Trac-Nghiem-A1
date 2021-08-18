<?php
include_once APP_PATH . '/libs/Database.php';

class PhongThiTable extends Database
{
    public function create()
    {
        $sql = "
            CREATE TABLE IF NOT EXISTS phongthi (
                id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL COMMENT 'Khóa chính',
                maphongthi varchar(20) NOT NULL COMMENT 'Mã phòng thi',
                ngaythi datetime NOT NULL COMMENT 'Ngày thi',
                thoigianbatdau datetime NOT NULL COMMENT 'Thời gian bắt đầu thi',
                thoigianketthuc datetime NOT NULL COMMENT 'Thời gian kết thúc thi'
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";

        $this->_mysqli->query($sql);
    }

    public function drop()
    {
        $sql = "
            DROP TABLE IF EXISTS `phongthi`
        ";

        $this->_mysqli->query($sql);
    }
}
