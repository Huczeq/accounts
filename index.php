<?php
include("Config/config.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Strona główna</title>
    </head>
    <body>
        <?php
        if($user->isLogged()){
            ////////////////////USER IS LOGGED \/  ////////////
        ?>
            Jesteś zalogowany jako: <?php echo $user->getName(); ?><br/>
            <a href="logout.php">Wyloguj się</a>
        <?php
        }else{
            //////////////////USER IS NOT LOGGED \/  //////////
        ?>
            <a href="login.php">Zaloguj się</a>
        <?php
        }
        ?>
    </body>
</html>