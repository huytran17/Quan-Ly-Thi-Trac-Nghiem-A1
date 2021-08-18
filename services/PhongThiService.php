<?php

include_once APP_PATH . '/repos/PhongThiRepo.php';
include_once APP_PATH . '/services/BaseService.php';

class PhongThiService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new PhongThiRepo());
    }
}
