<?php

include_once APP_PATH . '/repos/QuyDinhRepo.php';
include_once APP_PATH . '/services/BaseService.php';

class QuyDinhService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new QuyDinhRepo());
    }
}
