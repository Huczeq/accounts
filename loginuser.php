<?php
require("Config/config.php");

if($user->isLogged()) {
    echo "Jesteś już zalogowany";
    exit();
}

if(!isSet($_POST['login']) || !isSet($_POST['password'])){
    echo "Błąd: Nie otrzymano potrzebnych danych.";
    exit();
}

if($user->login($dbconnect, $_POST['login'], $_POST['password'])) {
    echo "ok";
}else{
    echo "Błąd: Użytkownik o podanym loginie i haśle nie istnieje.";
}
?>