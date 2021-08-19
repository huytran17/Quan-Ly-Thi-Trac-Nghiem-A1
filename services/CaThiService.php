<?php

include_once APP_PATH . '/repos/CaThiRepo.php';
include_once APP_PATH . '/services/BaseService.php';
include_once APP_PATH . '/interfaces/ICaThiInterface.php';

class CaThiService extends BaseService implements ICaThiInterface
{
    private $_caThiRepo = null;

    public function __construct()
    {
        $this->_caThiRepo = new CaThiRepo();
        parent::__construct($this->_caThiRepo);
    }

    public function getAllWithThiSinh(): mysqli_result|bool
    {
        return $this->_caThiRepo->getAllWithThiSinh();
    }

    public function getByIdWithThiSinh($id): mysqli_result|bool
    {
        return $this->_caThiRepo->getByIdWithThiSinh($id);
    }

    public function getAllWithPhongThi(): mysqli_result|bool
    {
        return $this->_caThiRepo->getAllWithPhongThi();
    }

    public function getByIdWithPhongThi($id): mysqli_result|bool
    {
        return $this->_caThiRepo->getByIdWithPhongThi($id);
    }
}
