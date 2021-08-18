<?php

interface IBaseInterface
{
    /**
     * Lấy tất cả dữ liệu
     *
     * @return mysqli_result|bool
     */
    public function getAll(): mysqli_result|bool;
    /**
     * Lấy bản ghi theo ID
     *
     * @param [int] $id
     * @return mysqli_result|bool
     */
    public function getById($id): mysqli_result|bool;
    /**
     * Thêm bản ghi mới
     *
     * @param array $data
     * @return integer
     */
    public function insert($data = []): int;
    /**
     * Chỉnh sửa bản ghi hiện có
     *
     * @param [int] $id
     * @param array $data
     * @return integer
     */
    public function update($id, $data = []): int;
    /**
     * Xóa bản ghi hiện có
     *
     * @param [int] $id
     * @return integer
     */
    public function delete($id): int;
}
