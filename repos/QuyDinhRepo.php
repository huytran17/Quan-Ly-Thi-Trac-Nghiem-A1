<?php

include_once APP_PATH . '/repos/BaseRepo.php';
include_once APP_PATH . '/interfaces/IQuyDinhInterface.php';

class QuyDinhRepo extends BaseRepo implements IQuyDinhInterface
{
    private $__table = 'quydinh';

    public function __construct()
    {
        parent::__construct($this->__table);
    }
}
