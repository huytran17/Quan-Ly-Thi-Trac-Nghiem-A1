<?php

include_once APP_PATH . '/repos/BienBanRepo.php';
include_once APP_PATH . '/services/BaseService.php';
include_once APP_PATH . '/interfaces/IBienBanInterface.php';

class BienBanService extends BaseService implements IBienBanInterface
{
    private $_bienBanRepo = null;

    public function __construct()
    {
        parent::__construct(new BienBanRepo());
        $this->_bienBanRepo = new BienBanRepo();
    }

    public function getAllWithThiSinh(): mysqli_result|bool
    {
        return $this->_bienBanRepo->getAllWithThiSinh();
    }

    public function getByIdWithThiSinh($id): mysqli_result|bool
    {
        return $this->_bienBanRepo->getByIdWithThiSinh($id);
    }
}
