<?php

session_start();
include "inc/funzioni.php";

if(isset($_SESSION['current_user']))
    echo "window.location.href = 'benvenuto.php'";  //per fare il redirect alla pagina di benvenuto

if(isset($_POST['username'])) {

    if(loginInputVal($_POST)){
        if(checkCredentials($_POST)){
            $_SESSION['current_user'] = $_POST['username'];
            echo "window.location.href = 'benvenuto.php'";
        }
    }
    else
        echo "mostraErrore('Dati mancanti o non validi.')";
        
}

?>