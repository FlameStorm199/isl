<?php
session_start();
?>

<html>

    <head>
        <title>Benvenuto</title>
    </head>

    <body>
        <h1>Benvenuto, <?php echo $_SESSION['current_user']; ?></h1>
        <p><a href="logout.php">Logout</a></p>
    </body>

</html>