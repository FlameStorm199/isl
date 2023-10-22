<!doctype html>
<html>
    <head>
        <title>Login to ISL software</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="css/login_style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <!-- EG: Aggiungere qualche elemento per fare l'header -->
        <nav class="navbar bg-color">
        <a class="navbar-brand" href="#">
            <img src="img/nav-logo-removebg.png" id="logo-img" alt="">
        </a>
         <!-- <div class="help"><img src="img/settings.png" alt="settings icon"></div> -->
        </nav>
        <div class="align">
        <div id="div-login">
            <div class="title-menu">Log in to ISL</div>

            <!-- EG: Si può usare anche jQuery e evitare di fare form in PHP-->
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <label for="">Username</label>
                <input type="text" name="username" id="" class="input-login">
                <label for="">Password</label>
                <input type="password" name="password" id="" class="input-login"><br>
                <input type="submit" value="Login" id="btn-login">
            </form>
            <div class="signin_menu">Don't have an account? <a href="">Sign up</a></div>
            <!-- <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <input type="submit" value="Sign up">
            </form> -->
        </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>