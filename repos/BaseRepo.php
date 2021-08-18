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
        } catch (mysqli_sql_exception $e) {
            throw $e;
        }
        return $this->_mysqli->query($sql);
    }

    public function getById($id): mysqli_result|bool
    {
        try {
            $stmt = $this->_mysqli->prepare('select * from ' . $this->__table . ' where id = ?');
            $stmt->bind_param('s', $id);
            $stmt->execute();
        } catch (mysqli_sql_exception $e) {
            throw $e;
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

        $this->_mysqli->begin_transaction();

        try {
            $sth = $this->_pdo->prepare($sql);

            foreach ($fieldValues as $key => &$value) {
                $sth->bindParam($key + 1, $value);
            }

            $sth->execute();

            $this->_mysqli->commit();
        } catch (PDOException $e) {
            $this->_mysqli->rollback();
            throw $e;
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

        $this->_mysqli->begin_transaction();

        try {
            $sht = $this->_pdo->prepare($sql);

            foreach ($fieldValues as $key => &$value) {
                $sht->bindParam($key + 1, $value);
            }

            $sht->bindParam(count($fieldValues) + 1, $id);

            $sht->execute();

            $this->_mysqli->commit();
        } catch (PDOException $e) {
            $this->_mysqli->rollback();
            throw $e;
        }

        return $sht->rowCount();
    }

    public function delete($id): int
    {
        $this->_mysqli->begin_transaction();
        try {
            $stmt = $this->_mysqli->prepare(
                "DELETE FROM " . $this->__table . " WHERE id=?"
            );
            $stmt->bind_param('s', $id);
            $stmt->execute();

            $this->_mysqli->commit();
        } catch (mysqli_sql_exception $e) {

            $this->_mysqli->rollback();
            throw $e;
        }
        return $stmt->affected_rows;
    }
}
