<?php
include_once APP_PATH . '/services/ThiSinhService.php';
include_once(APP_PATH . '/Traits/DateTimeFormat.php');
include_once(APP_PATH . '/Traits/UploadFile.php');

class ThiSinh extends Model
{
    use DateTimeFormat, UploadFile;

    private $__service;

    public function __construct()
    {
        $this->__service = new ThiSinhService();
    }

    public function getAll(): mysqli_result|bool
    {
        return $this->__service->getAll();
    }

    public function getById($id): mysqli_result|bool
    {
        return $this->__service->getById($id);
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
