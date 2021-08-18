<?php

class Database
{
    private $__host, $__username, $__password, $__database;
    protected $_mysqli = null, $_pdo = null;

    public function __construct()
    {
        $this->__host = HOST;
        $this->__username = USERNAME;
        $this->__password = PASSWORD;
        $this->__database = DATABASE;
        $this->getConnection();
    }

    public function getMysqliConnection(): mysqli
    {
        if ($this->_mysqli === null) {
            $this->_mysqli = new mysqli($this->__host, $this->__username, $this->__password, $this->__database);
        }

        if ($this->_mysqli->connect_errno) {
            exit('Failed to connect to the database: ' . $this->_mysqli->connect_error);
        }
        return $this->_mysqli;
    }

    public function getPdoConnection(): PDO
    {
        if ($this->_pdo === null) {
            try {
                $this->_pdo = new PDO("mysql:host=" . $this->__host . ";dbname=" . $this->__database, $this->__username, $this->__password);

                $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            // Nhánh kết nối thất bại
            catch (PDOException $e) {
                throw $e;
            }
        }

        return $this->_pdo;
    }

    public function getConnection()
    {
        $this->getMysqliConnection();
        $this->getPdoConnection();
    }

    public function disconnect(): void
    {
        $this->_mysqli->close();
        $this->_pdo = null;
    }

    public function __destruct()
    {
        $this->disconnect();
    }
}
