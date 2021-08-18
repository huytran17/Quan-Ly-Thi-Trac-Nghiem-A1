<?php

include_once APP_PATH . '/repos/BaseRepo.php';
include_once APP_PATH . '/interfaces/IPhongThiInterface.php';

class PhongThiRepo extends BaseRepo implements IPhongThiInterface
{
    private $__table = 'phongthi';

    public function __construct()
    {
        parent::__construct($this->__table);
    }
}
