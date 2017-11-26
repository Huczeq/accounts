<?php

class DataBaseConnector {
    private $connect;
    private $isConnected;
    
    function __construct($host, $user, $password, $database) {
        $this -> connect = @new mysqli($host, $user, $password, $database);
        if($this->connect->connect_errno){
            throw new Exception("Problem z połączeniem z bazą danych.","1");
        }
    }
    
    function __destruct() {
        if(!$this->connect) $this->connect->close();
    }
    
    public function getConnectMysqli() {
        return $this->connect;
    }
    
    public function query($query) {
        return mysqli_query($this->connect, $query);
    }
    
    public function isConnected() {
        if($this->connect) {
            return true;
        }else {
            return false;
        }
    }
}

?>