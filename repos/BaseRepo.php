<?php

include_once APP_PATH . '/interfaces/IBaseInterface.php';
include_once APP_PATH . '/libs/Database.php';

class BaseRepo extends Database implements IBaseInterface
{
    private $__table = '';

    public function __construct($table)
    {
        parent::__construct();
        $this->__table = $table;
    }

    public function getAll(): mysqli_result|bool
    {
        try {
            $sql = "SELECT * FROM " . $this->__table;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return $this->_mysqli->query($sql);
    }

    public function getById($id): mysqli_result|bool
    {
        try {
            $stmt = $this->_mysqli->prepare('select * from ' . $this->__table . ' where id = ?');
            $stmt->bind_param('s', $id);
            $stmt->execute();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return $stmt->get_result();
    }

    public function insert($data = []): int
    {
        $fieldNames = array_keys($data);
        $fieldValues = array_values($data);

        $sql = "INSERT INTO " . $this->__table . "(";

        foreach ($fieldNames as $field) {
            $sql .= $field . ",";
        }

        $sql = rtrim($sql, ',');
        $sql .= ") values (";

        foreach ($fieldNames as $field) {
            $sql .= "?,";
        }

        $sql = rtrim($sql, ',');
        $sql .= ")";

        try {
            $sth = $this->_pdo->prepare($sql);

            foreach ($fieldValues as $key => &$value) {
                $sth->bindParam($key + 1, $value);
            }

            $sth->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $sth->rowCount();
    }

    public function update($id, $data = []): int
    {
        $fieldValues = array_values($data);

        $sql = "UPDATE " . $this->__table . " SET ";

        foreach ($data as $key => &$value) {
            $sql .= $key . "=?,";
        }

        $sql = rtrim($sql, ",");

        $sql .= " WHERE id = ?";

        try {
            $sht = $this->_pdo->prepare($sql);

            foreach ($fieldValues as $key => &$value) {
                $sht->bindParam($key + 1, $value);
            }

            $sht->bindParam(count($fieldValues) + 1, $id);

            $sht->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $sht->rowCount();
    }

    public function delete($id): int
    {
        try {
            $stmt = $this->_mysqli->prepare(
                "DELETE FROM " . $this->__table . " WHERE id=?"
            );
            $stmt->bind_param('s', $id);
            $stmt->execute();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return $stmt->affected_rows;
    }
}
