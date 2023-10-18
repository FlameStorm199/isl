<!doctype html>
<html>
    <head>
        <title>Login to ISL</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="login_style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <!-- EG: Aggiungere qualche elemento per fare l'header -->
        <div class="login_menu">Log in to ISL</div>
        <div class="help"><img src="img/settings.png" alt="settings icon"></div>
        <!-- EG: Si può usare anche jQuery e evitare di fare form in PHP-->
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <input type="text" name="username" id="">
            <input type="password" name="password" id="">
            <input type="submit" value="Login">
        </form>
        <div class="signin_menu">Don't have an account? Sign in</div>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <input type="submit" value="Sign in">
        </form>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>