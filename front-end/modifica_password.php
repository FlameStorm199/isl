<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <input type="text" name="username">
    <input type="text" name="password">
    <input type="submit" name="modifica" value="Modifica password">
</form>

<?php

if(isset($_POST['modifica'])) {

    if(isset($_POST['username'])&&!empty($_POST['username'])&&isset($_POST['password'])&&!empty($_POST['password'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $db_server = "localhost";
        $db_user = "root";
        $db_pw = "";
        $db_name = "utenti";

        $connessione = new mysqli($db_server,$db_user,$db_pw,$db_name);

        if($connessione->connect_error)
            die("Connessione al database fallita: ".$connessione->connect_error);

        $hashedPw = password_hash($password, PASSWORD_BCRYPT);  //calcoliamo l'hash della nuova password

        $query = "UPDATE utenti SET password = '$hashedPw' WHERE username = '$username'";   //aggiorniamo l'utente nel database con la nuova password cifrata
        $ris = $connessione->query($query); //eseguiamo il codice SQL

        if($ris)
            echo "Password modificata con successo!";
        else
            echo "Errore: ".$connessione->error;

        $connessione->close();

    }
    else
        echo "Errore: Dati mancanti.";

}

?>