<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('./views/meta.php') ?>
    <title>Login | Sistema de votación</title>

    <!--CSS BOOTSTRAP-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--CSS-->
    <link rel="stylesheet" href="./css/login.css">

    <!--FONTS-->
    <link href="https://fonts.googleapis.com/css?family=Oxygen&display=swap" rel="stylesheet">

</head>
<body id="particles-js">

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="./img/ponal_logo.png" id="icon" alt="Logo policía nacional" />
            </div>

            <!-- Login Form -->
            <form action="./php/auth.php" method="post">
                <input type="text" id="login" class="fadeIn second" name="user" placeholder="login" required>
                <input type="password" id="password" class="fadeIn third" name="pass" placeholder="password" required>
                <input type="submit" name="btnAuth" class="fadeIn fourth" value="Iniciar Sesión">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="https://wa.me/573166989045?texto=Hola,%20necesito%20soporte.">Soporte</a>
            </div>

        </div>
    </div>

    <!--JS BOOTSTRAP-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</body>
</html>