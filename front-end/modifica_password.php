<h1>Modifica password</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label for="username">Utente: </label>
    <input type="text" name="username">
    <br><br>
    <label for="password">Nuova password: </label>
    <input type="text" name="password">
    <br><br>
    <input type="submit" name="modifica" value="Modifica password">
</form>

<?php

if(isset($_POST['modifica'])) {

    if(isset($_POST['username'])&&!empty($_POST['username'])&&isset($_POST['password'])&&!empty($_POST['password'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $connessione = new mysqli('localhost','root','','utenti');

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