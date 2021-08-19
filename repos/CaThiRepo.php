<?php

include_once APP_PATH . '/repos/BaseRepo.php';
include_once APP_PATH . '/interfaces/ICaThiInterface.php';

class CaThiRepo extends BaseRepo implements ICaThiInterface
{
    private $__table = 'cathi';

    public function __construct()
    {
        parent::__construct($this->__table);
    }

    public function getAllWithThiSinh(): mysqli_result|bool
    {
        try {
            $sql = "SELECT * "
                . " FROM thisinh"
                . " INNER JOIN " . $this->__table . " ON thisinh.id = " . $this->__table . ".thisinh_id";
            $result = $this->_mysqli->query($sql);
        } catch (mysqli_sql_exception $e) {
            throw $e;
        }
        return $result;
    }

    public function getByIdWithThiSinh($id): mysqli_result|bool
    {
        try {
            $stmt = $this->_mysqli->prepare("
            SELECT * 
            FROM thisinh 
            INNER JOIN " . $this->__table . " ON thisinh.id = " . $this->__table . ".thisinh_id WHERE " . $this->__table . ".id = ?
        ");
            $stmt->bind_param('s', $id);
            $stmt->execute();
            $result = $stmt->get_result();
        } catch (mysqli_sql_exception $e) {
            throw $e;
        }
        return $result;
    }

    public function getAllWithPhongThi(): mysqli_result|bool
    {
        try {
            $sql = "SELECT * "
                . " FROM phongthi"
                . " INNER JOIN " . $this->__table . " ON phongthi.id = " . $this->__table . ".thisinh_id";
            $result = $this->_mysqli->query($sql);
        } catch (mysqli_sql_exception $e) {
            throw $e;
        }
        return $result;
    }

    public function getByIdWithPhongThi($id): mysqli_result|bool
    {
        try {
            $stmt = $this->_mysqli->prepare("
            SELECT * 
            FROM phongthi 
            INNER JOIN " . $this->__table . " ON phongthi.id = " . $this->__table . ".phongthi_id WHERE " . $this->__table . ".id = ?
        ");
            $stmt->bind_param('s', $id);
            $stmt->execute();
            $result = $stmt->get_result();
        } catch (mysqli_sql_exception $e) {
            throw $e;
        }
        return $result;
    }
}
