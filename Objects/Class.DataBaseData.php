<?php

class DataBaseData {
    private $host;
    private $user;
    private $password;
    
    function __construct() {
        if(!file_exists("Config/dataToMysql.txt")) {
            $this->host = "127.0.0.1";
            $this->user = "root";
            $this->password = "";
            return;
        }
        $file = fopen("Config/dataToMysql.txt", "r");
        for($i=0;$i<=3;$i++) {
            $line = fgets($file);
            $data = explode("=",$line);
            switch(trim($data[0])) {
                    case "host":
                    $this->host=trim($data[1]);
                        break;
                    case "user":
                    $this->user=trim($data[1]);
                        break;
                    case "password":
                    $this->password=trim($data[1]);
                        break;
                    
            }
        }
        fclose($file);
    }
    
    public function getHost() {
        return $this->host;
    }
    
    public function getUser() {
        return $this->user;
    }
    
    public function getPassword() {
        return $this->password;
    }
}

?>