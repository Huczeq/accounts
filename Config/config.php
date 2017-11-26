<?php

require("Objects/Class.DataBaseConnector.php");
require("Objects/Class.DataBaseData.php");
require("Objects/Class.User.php");

try {
    $dbdata = new DataBaseData();
} catch (Exception $e) {
    echo $e->getMessage();
    //exit;
}
try {
    $dbconnect = new DataBaseConnector($dbdata->getHost(), $dbdata->getUser(), $dbdata->getPassword(), "huczeq");
} catch (Exception $e) {
    echo $e->getMessage();
    //exit;
}
$user = new User();

?>