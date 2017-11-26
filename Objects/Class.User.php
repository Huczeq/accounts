<?php
require("Objects/Class.Session.php");

class User {
    
    private $session;
    
    function __construct() {
        $this->session = new Session();
    }
    
    public function getSession() {
        return $this->session;
    }
    
    public function isLogged() {
        return $this->session->isLogged();
    }
    
    public function login($dbconnect, $login, $password) {
        /*$result = $dbconnect->query("SELECT id,name,password FROM users WHERE name='$login' AND password='$password';");
        if($result->num_rows!=1) {
            return false;
        }*/
        $_SESSION['userlogin'] = $login;
        $_SESSION['userid'] = 12;//$result->fetch_assoc()['id'];
        return true;
    }
    
    public function logout() {
        $this->session->destroy();
    }
    
    public function getName() {
        if(!isSet($_SESSION['userlogin'])) return false;
        return $_SESSION['userlogin'];
    }
    
    public function getId() {
        if(!isSet($_SESSION['userid'])) return false;
        return $_SESSION['userid'];
    }
}

?>