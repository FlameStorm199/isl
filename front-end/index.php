<!doctype html>
<?php header('Access-Control-Allow-Origin: *'); ?>
<html>

<head>
    <title>Login to ISL software</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="css/login_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Rubik' rel='stylesheet'>
</head>

<body>
    <!-- EG: Aggiungere qualche elemento per fare l'header -->
    <nav class="navbar bg-color">
        <a class="navbar-brand" href="#">
            <!-- <img src="img/nav-logo-reversed.png" id="logo-img" alt=""> -->
            <img src="img/nav-logo-removebg.png" id="logo-img" alt="">
        </a>
        <!-- <div class="help"><img src="img/settings.png" alt="settings icon"></div> -->
    </nav>
    <div class="align">
        <div id="div-login">
            <div class="title-menu">Log in to ISL</div>
            <br>

            <!-- EG: Si può usare anche jQuery e evitare di fare form in PHP-->
            <form>
                <div class="form-floating mb-3">
                    <input type="text" name="username" id="floatingInput" class="form-control" placeholder="Username" autocomplete="off">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" id="floatingPassword" class="form-control" placeholder="Password" autocomplete="off"><br>
                    <label for="floatingPassword">Password</label>
                    <!-- aggiunge show password -->
                </div>
                <input type="button" name="login" value="Login" id="btn-login">
            </form>
            <!-- <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <input type="submit" value="Sign up">
            </form> -->
            <div id="result"></div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/script_login.js" type="text/javascript"></script>

</html>