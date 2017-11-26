<?php
require("Config/config.php");

$user->logout();
header("Location: login.php");
?>