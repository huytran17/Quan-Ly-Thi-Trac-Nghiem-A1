<?php

include_once APP_PATH . '/repos/ThiSinhRepo.php';
include_once APP_PATH . '/services/BaseService.php';

class ThiSinhService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new ThiSinhRepo());
    }
}
