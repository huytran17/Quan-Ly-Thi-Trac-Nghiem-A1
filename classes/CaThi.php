<?php

include_once APP_PATH . '/services/CaThiService.php';
include_once(APP_PATH . '/Traits/DateTimeFormat.php');

class CaThi extends Model
{
    use DateTimeFormat;

    private $__service;

    public function __construct()
    {
        $this->__service = new CaThiService();
    }

    public function getAll(): mysqli_result|bool
    {
        return $this->__service->getAll();
    }

    public function getAllWithThiSinh(): mysqli_result|bool
    {
        return $this->__service->getAllWithThiSinh();
    }

    public function getByIdWithThiSinh($id): mysqli_result|bool
    {
        return $this->__service->getByIdWithThiSinh($id);
    }

    public function getAllWithPhongThi(): mysqli_result|bool
    {
        return $this->__service->getAllWithPhongThi();
    }

    public function getByIdWithPhongThi($id): mysqli_result|bool
    {
        return $this->__service->getByIdWithPhongThi($id);
    }

    public function insert($data): int
    {
        return $this->__service->insert($data);
    }

    public function update($id, $data): int
    {
        return $this->__service->update($id, $data);
    }

    public function delete($id): int
    {
        return $this->__service->delete($id);
    }
}
