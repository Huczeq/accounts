<?php
require("Config/config.php");
if($user->isLogged()){
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Logowanie</title>
        <link href="styles/main.css" rel="stylesheet">
        <link href="styles/login.css" rel="stylesheet">
        <script>
            function loginUser() {
                var xml = new XMLHttpRequest();
                xml.open("post","loginuser.php",true);
                var formdata = new FormData();
                xml.onreadystatechange = function () {
                    if(xml.readyState==4) {
                        if(xml.responseText=="ok") {
                            document.getElementById("error").innerHTML = "Zostałeś zalogowany<br/>Za 2s nastąpi przekierowanie do strony głównej.";
                            setTimeout(function(){
                                location.href = "index.php";
                            }, 2000);
                        }else{
                            document.getElementById("error").innerHTML = xml.responseText;
                        }
                        xml = null;
                    }
                }
                
                formdata.append("login", document.getElementsByName("login")[0].value);
                formdata.append("password", document.getElementsByName("password")[0].value);
                
                xml.send(formdata);
                return false;
            }
            
            function inputFocus(element) {
                var elements = element.parentElement;
                elements.getElementsByClassName("floating-label")[0].style.top = "-10px";
                elements.getElementsByClassName("floating-label")[0].style.fontSize = "10px";
                elements.getElementsByClassName("floating-label")[0].style.color = "lightgreen";
                elements.getElementsByClassName("linem")[0].style.width = "300px";
                elements.getElementsByClassName("linem")[0].style.backgroundColor = "lightgreen";
                console.log("focus");
            }
            function inputBlur(element) {
                console.log("blur");
                if(element.value==""){
                    var elements = element.parentElement;
                    elements.getElementsByClassName("floating-label")[0].style.top = "5px";
                    elements.getElementsByClassName("floating-label")[0].style.fontSize = "20px";
                    elements.getElementsByClassName("floating-label")[0].style.color = "gray";
                    elements.getElementsByClassName("linem")[0].style.width = "0px";
                }else{
                    var elements = element.parentElement;
                    elements.getElementsByClassName("floating-label")[0].style.color = "gray";
                    elements.getElementsByClassName("linem")[0].style.backgroundColor = "gray";
                    elements.getElementsByClassName("linem")[0].style.width = "0px";
                }
            }
        </script>
    </head>
    <body>
        <div id="main">
            <p id="error"></p>
            <form onsubmit="return loginUser();">
                <div class="input">
                    <input class="inputForm" onfocus="inputFocus(this)" onblur="inputBlur(this)" name="login" type="text">
                    <span class="floating-label">Login</span>
                    <div class="line"><div class="linem"></div></div>
                </div>
                <div class="input">
                    <input name="password" onfocus="inputFocus(this)" onblur="inputBlur(this)" type="password">
                    <span class="floating-label">Hasło</span>
                    <div class="line"><div class="linem"></div></div>
                </div>
                <button>Zaloguj się</button>
            </form>
        </div>
    </body>
</html>