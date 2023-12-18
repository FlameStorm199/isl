<?php

function connectToDB(){

    try{
        return new mysqli('localhost','root','','utenti');
    }
    catch(Exception $e){
        die("mostraErrore('".$e->getMessage()."')");
    }

}

function loginInputVal($dati){

    if(isset($dati['username'])&&!empty($dati['username'])&&isset($dati['password'])&&!empty($dati['password']))
        return true;

    return false;

}

function checkCredentials($dati) {
    
    $conn = connectToDB();

    $query = "SELECT password FROM utenti WHERE username = '".$dati['username']."'";
    
    try{

        $ris = $conn->query($query);

        if($ris->num_rows>0){

            $row = $ris->fetch_assoc();
            
            if(password_verify($dati['password'],$row['password']))
                return true;
            else
                echo "mostraErrore('Password errata.')";

        }
        else
            echo "mostraErrore('Utente inesistente.')";

    }
    catch(Exception $e){
        die("mostraErrore('".$e->getMessage()."')");
    }

    return false;

}

?>