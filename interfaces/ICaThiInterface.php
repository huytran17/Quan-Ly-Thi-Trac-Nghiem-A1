<?php

include_once APP_PATH . '/interfaces/IBaseInterface.php';

interface ICaThiInterface extends IBaseInterface
{
    /**
     * Lấy tất cả bản ghi cùng với dữ liệu từ bảng chứa khóa ngoại
     *
     * @return mysqli_result|bool
     */
    public function getAllWithThiSinh(): mysqli_result|bool;
    /**
     * Lấy bản ghi theo ID cùng dữ liệu từ bảng chứa khóa ngoại
     *
     * @param [int] $id
     * @return mysqli_result|bool
     */
    public function getByIdWithThiSinh($id): mysqli_result|bool;
    /**
     * Lấy tất cả bản ghi cùng với dữ liệu từ bảng chứa khóa ngoại
     *
     * @return mysqli_result|bool
     */
    public function getAllWithPhongThi(): mysqli_result|bool;
    /**
     * Lấy bản ghi theo ID cùng dữ liệu từ bảng chứa khóa ngoại
     *
     * @param [int] $id
     * @return mysqli_result|bool
     */
    public function getByIdWithPhongThi($id): mysqli_result|bool;
}
