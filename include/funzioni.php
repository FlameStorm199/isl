<?php

function controlloLogin($dati) {

    if(isset($dati['username'])&&!empty($dati['username'])&&isset($dati['password'])&&!empty($dati['password'])) {

        $username = $dati['username'];
        $password = $dati['password'];

        $db_server = "localhost";   //ip/dns del server
        $db_user = "root";  //utente del db, utilizziamo quello di default per provare
        $db_pw = "";    //password dell'utente del db, la password di root è vuota
        $db_name = "utenti";    //nome del database a cui ci colleghiamo

        $connessione = new mysqli($db_server,$db_user,$db_pw,$db_name); //creiamo la connessione col db

        if($connessione->connect_error) //controlliamo se la connessione trova errori
            die("Connessione al database fallita: ".$connessione->connect_error);   //in caso li stampiamo e fermiamo il programma

        $query = "SELECT password FROM utenti WHERE username = '$username'";    //creiamo la stringa da eseguire in linguaggio sql
        $ris = $connessione->query($query); //prendiamo i dati tramite il quel comando

        if($ris->num_rows != 0){    //se c'è una riga nella nostra query, quindi se abbiamo trovato un utente

            $row = $ris->fetch_assoc(); //row diventerà l'array con i diversi campi della riga nelle sue celle
            
            if(password_verify($password,$row['password'])) //verifichiamo la correttezza delle password, tramite password_verify essendo salvate in hash
                return true;
            else
                echo "Password errata.";

        }
        else
            echo "Errore: Utente inesistente.";

    }
    else
        echo "Errore: Dati mancanti o inesistenti.";

}

?>