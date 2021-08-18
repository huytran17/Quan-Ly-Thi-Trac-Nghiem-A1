<?php

interface IBaseInterface
{
    public function getAll(): mysqli_result|bool;
    public function getById($id): mysqli_result|bool;
    public function insert($data = []): int;
    public function update($id, $data = []): int;
    public function delete($id): int;
}
