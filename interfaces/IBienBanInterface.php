<?php

include_once APP_PATH . '/interfaces/IBaseInterface.php';

interface IBienBanInterface extends IBaseInterface
{
    public function getAllWithThiSinh() : mysqli_result|bool;
    public function getByIdWithThiSinh($id): mysqli_result|bool;
}
