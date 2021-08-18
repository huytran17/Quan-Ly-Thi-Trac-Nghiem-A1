<?php
include_once APP_PATH . '/libs/Database.php';

class CaThiTable extends Database
{
    public function create()
    {
        $sql = "
            CREATE TABLE cathi (
                id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL COMMENT 'Khóa chính',
                thisinh_id int(11) NOT NULL COMMENT 'Khóa ngoại bảng ThiSinh',
                phongthi_id int(11) NOT NULL COMMENT 'Khóa ngoại bảng PhongThi',
                CONSTRAINT FK_cathi_thisinhid FOREIGN KEY (thisinh_id) REFERENCES thisinh(id) ON DELETE CASCADE,
                CONSTRAINT FK_phongthi_thisinhid FOREIGN KEY (phongthi_id) REFERENCES phongthi(id) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;       
        ";

        $this->_mysqli->query($sql);
    }

    public function drop()
    {
        $sql = "
            DROP TABLE IF EXISTS `cathi`
        ";

        $this->_mysqli->query($sql);
    }
}
