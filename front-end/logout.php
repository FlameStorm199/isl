<?php

session_start();

if(isset($_SESSION['current_user'])){

    session_unset();
    session_destroy();
    
    header("Location: login.php");

}

?>