<?php

include_once APP_PATH . '/repos/BaoCaoRepo.php';
include_once APP_PATH . '/services/BaseService.php';
include_once APP_PATH . '/interfaces/IBaoCaoInterface.php';

class BaoCaoService extends BaseService implements IBaoCaoInterface
{
    private $_baoCaoRepo = null;

    public function __construct()
    {
        parent::__construct(new BaoCaoRepo());
        $this->_baoCaoRepo = new BaoCaoRepo();
    }

    public function getAllWithThiSinh(): mysqli_result|bool
    {
        return $this->_baoCaoRepo->getAllWithThiSinh();
    }

    public function getByIdWithThiSinh($id): mysqli_result|bool
    {
        return $this->_baoCaoRepo->getByIdWithThiSinh($id);
    }
}
