<?php

include_once APP_PATH . '/repos/BaseRepo.php';
include_once APP_PATH . '/interfaces/IThiSInhInterface.php';

class ThiSinhRepo extends BaseRepo implements IThiSInhInterface
{
    private $__table = 'thisinh';

    public function __construct()
    {
        parent::__construct($this->__table);
    }
}
