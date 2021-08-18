<?php

include_once APP_PATH . '/libs/Database.php';

class ThiSinhTable extends Database
{
    public function create()
    {
        $sql = "
            CREATE TABLE thisinh (
                id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL COMMENT 'Khóa chính',
                mathisinh varchar(20) NOT NULL COMMENT 'Mã thí sinh',
                hoten varchar(30) NOT NULL COMMENT 'Họ tên',
                ngaysinh date NOT NULL COMMENT 'Ngày sinh',
                diachi text NOT NULL COMMENT 'Địa chỉ',
                socmt varchar(50) NOT NULL COMMENT 'Số chứng minh thư',
                ngaydangkythi datetime DEFAULT current_timestamp() COMMENT 'Ngày đăng ký dự thi',
                sodienthoai varchar(20) DEFAULT NULL COMMENT 'Số điện thoại',
                gioitinh int(10) DEFAULT 1 COMMENT 'Giới tính (1: nam, 2: nữ, 3: khác)',
                avatar_photo_path longtext DEFAULT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";

        $this->_mysqli->query($sql);
    }

    public function drop()
    {
        $sql = "
            DROP TABLE IF EXISTS `thisinh`
        ";

        $this->_mysqli->query($sql);
    }
}
