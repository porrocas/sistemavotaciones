<?php
    session_start();
    if(isset($_SESSION['rol'])){
        if($_SESSION['rol'] == 'moderador'){
            $rol = $_SESSION['rol'];
            require('./php/functionsAdmin.php');
        } else {
            session_destroy();
            header('location: index.php');
        }
    } else {
        session_destroy();
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('./views/meta.php') ?>
    <title>Moderador | Sistema de votación</title>


    <!--CSS-->
    <link rel="stylesheet" href="./css/admin.css">

    <!--CSS BOOTSTRAP-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    
</head>

<body>
    <!--NAV TOP-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <a class="navbar-brand" href="admin.php"> <img src="./img/ponal_logo.png" alt="logo ponal" width="50px"
                heigh="50px">
            Moderador</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="admin.php">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=crear">Crear Usuarios<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=reporte">Generar Reportes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./php/logout.php">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Hola</li>
            <li class="breadcrumb-item active" aria-current="page">
                <?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido'] ?></li>
        </ol>
    </nav>
    <!--NAV TOP BOTTOM-->
    <?php
        if(isset($_GET['page'])){
            $page = $_GET['page'];
            switch ($page) {
                case 'crear':
                    include('./views/admin/crearUser.php');
                    break;
                case 'reporte':
                    include('./views/admin/reporte.php');
                    break;
                default:
                    include('./views/admin/inicio.php');
                    break;
            }
        } else {
            include('./views/admin/inicio.php');
        }
    ?>
    <!--JS BOOTSTRAP-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>