<?php

class DataBase extends PDO
{

    private $_HOST_NAME = "localhost";
    private $_DB_NAME = "amazingvente";
    private $_DB_USER = "root";
    private $_DB_PASS = "";

    public function __construct()
    {

        try {
            parent::__construct("mysql:host=" . $this->_HOST_NAME . ";dbname=" . $this->_DB_NAME, $this->_DB_USER, $this->_DB_PASS);
        } catch (PDOException $e) {

            die("ERREUR EST SURVENUE : " . $e->getMessage());
        }
    }
}
