<?php

include_once APP_PATH . '/repos/BaseRepo.php';
include_once APP_PATH . '/interfaces/IBaseInterface.php';

class BaseService implements IBaseInterface
{
    protected $_repo = null;

    public function __construct(BaseRepo $repo)
    {
        $this->_repo = $repo;
    }

    public function getAll(): mysqli_result|bool
    {
        return $this->_repo->getAll();
    }

    public function getById($id): mysqli_result|bool
    {
        return $this->_repo->getById($id);
    }

    public function insert($data = []): int
    {
        return $this->_repo->insert($data);
    }

    public function update($id, $data = []): int
    {
        return $this->_repo->update($id, $data);
    }

    public function delete($id): int
    {
        return $this->_repo->delete($id);
    }
}
