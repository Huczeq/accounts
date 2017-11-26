<?php

class Session {
    
    function __construct() {
        session_start();
        $id = $_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'];
        if(isSet($_SESSION['id'])) {
            if($id != $_SESSION['id']){
                //echo "id!=sessid";
                $_SESSION['error'] = "ktos probowal sie zalogowac lub zdobyc dostep do twojego konta.";
                session_write_close();
                setcookie(session_name(), "", time()-3600, '/');
                session_start();
                session_regenerate_id(false);
                $_SESSION = array();
                $_SESSION['id'] = $id;
            }else{
                session_regenerate_id(true);
            }
        }else{
            //PIERWSZY RAZ JEST TWORZONA
            $_SESSION['id'] = $id;
        }
        if(!isSet($_SESSION['expired'])){
            $_SESSION['expired'] = time()+1800;
        }else if($_SESSION['expired'] < time()){
            session_destroy();
            setcookie(session_name(), "", time()-3600, '/');
        }
    }
    
    public function isLogged() {
        if(isSet($_SESSION['userlogin'])) return true;
        return false;
    }
    
    public function getLogin() {
        if(isSet($_SESSION['userlogin'])) return $_SESSION['userlogin'];
        return NULL;
    }
    
    public function getId() {
        if(isSet($_SESSION['userid'])) return $_SESSION['userid'];
        return NULL;
    }
    
    public function destroy() {
        session_destroy();
        setcookie(session_name(), "", time()-3600, '/');
    }
}

?>