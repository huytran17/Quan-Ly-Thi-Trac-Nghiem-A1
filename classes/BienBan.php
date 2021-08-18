<?php
include_once APP_PATH . '/services/BienBanService.php';

class BienBan extends Model
{
    private $__service;

    public function __construct()
    {
        $this->__service = new BienBanService();
    }

    public function getAllWithThiSinh(): mysqli_result|bool
    {
        return $this->__service->getAllWithThiSinh();
    }

    public function getByIdWithThiSinh($id): mysqli_result|bool
    {
        return $this->__service->getByIdWithThiSinh($id);
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
