<?php

include_once APP_PATH . '/repos/BaseRepo.php';
include_once APP_PATH . '/interfaces/IBienBanInterface.php';

class BienBanRepo extends BaseRepo implements IBienBanInterface
{
    private $__table = 'bienban';

    public function __construct()
    {
        parent::__construct($this->__table);
    }

    public function getAllWithThiSinh(): mysqli_result|bool
    {
        $sql = "SELECT * "
            . " FROM thisinh"
            . " INNER JOIN " . $this->__table . " ON thisinh.id = " . $this->__table . ".thisinh_id";
        return $this->_mysqli->query($sql);
    }

    public function getByIdWithThiSinh($id): mysqli_result|bool
    {
        $stmt = $this->_mysqli->prepare("
            SELECT * 
            FROM thisinh 
            INNER JOIN " . $this->__table . " ON thisinh.id = " . $this->__table . ".thisinh_id WHERE " . $this->__table . ".id = ?
        ");
        $stmt->bind_param('s', $id);
        $stmt->execute();
        return $stmt->get_result();
    }
}
