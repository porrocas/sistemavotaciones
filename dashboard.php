<?php
    session_start();
    if(isset($_SESSION['rol'])){
        if($_SESSION['rol'] == 'votante'){
            $rol = $_SESSION['rol'];
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
    <title>Votaciones | Sistema de votación</title>

    <!--CSS BOOTSTRAP-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="w-100 h-100">
        <div class="col-md-3 position-fixed h-100 bg-success d-flex flex-wrap justify-content-center"
            style="top: 0px; left: 0; z-index: 1000;">
            <div class="w-100">
                <img src="./img/ponal_logo.png" alt="logo policía nacional" class="img-fluid">
            </div>
            <div class="w-100">
                <p class="w-100 text-light text-center">Hola,
                    <?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido'] ?></p>
            </div>
            <div class="w-100">
                <div class="row col-md-12">
                    <p class="w-100 text-center text-light">Comité Autonomía Sistema Votaciones</p>
                    <span class="w-100 text-light" style="font-size: .8em">Propuestas:</span>
                </div>
                <!-- Default dropright button -->
                <div class="btn-group dropright w-100 mt-2">
                    <button type="button" class="btn dropdown-toggle text-light" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" style="background: #2D572C;">
                        Ala Rotatoria
                    </button>
                    <div class="dropdown-menu">
                        <!-- Dropdown menu links -->
                        <a class="dropdown-item" href="?busqueda=rot&linea=uh-60">UH-60</a>
                        <a class="dropdown-item" href="?busqueda=rot&linea=bell-212">BELL-212</a>
                        <a class="dropdown-item" href="?busqueda=rot&linea=hueyii">HUEY II</a>
                        <a class="dropdown-item" href="?busqueda=rot&linea=b-407-206">B-407-206</a>
                        <a class="dropdown-item" href="?busqueda=rot&linea=b-206">B-206</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="?busqueda=rot">Todos Los Candidatos</a>
                    </div>
                </div>
                <div class="btn-group dropright w-100 mt-2">
                    <button type="button" class="btn dropdown-toggle text-light" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" style="background: #2D572C;">
                        Ala Fija
                    </button>
                    <div class="dropdown-menu">
                        <!-- Dropdown menu links -->
                        <a class="dropdown-item" href="?busqueda=fija&linea=atr-42">ATR-42</a>
                        <a class="dropdown-item" href="?busqueda=fija&linea=dash-8">DASH-8</a>
                        <a class="dropdown-item" href="?busqueda=fija&linea=dc3-tp">DC3-TP</a>
                        <a class="dropdown-item" href="?busqueda=fija&linea=beech-craft">BEECH-CARFT</a>
                        <a class="dropdown-item" href="?busqueda=fija&linea=c-26">C-26</a>
                        <a class="dropdown-item" href="?busqueda=fija&linea=dhc-6">DHC-6</a>
                        <a class="dropdown-item" href="?busqueda=fija&linea=c-208">C-208</a>
                        <a class="dropdown-item" href="?busqueda=fija&linea=piper">PIPER</a>
                        <a class="dropdown-item" href="?busqueda=fija&linea=c-206">C-206</a>
                        <a class="dropdown-item" href="?busqueda=fija&linea=c152/172">C 152/172</a>
                        <a class="dropdown-item" href="?busqueda=fija&linea=learjet-45">LEARJET-45</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="?busqueda=fija">Todos Los Candidatos</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="w-100 mt-2">
                <div class="row col-md-12">
                    <span class="w-100 text-light" style="font-size: 1em">Mi Registro de actividad:</span>
                </div>
                <div class="w-100">
                    <button type="button" class="btn w-100 mt-2 text-light" style="background: #2D572C;">Votos</button>
                    <button type="button" class="btn w-100 mt-2 text-light"
                        style="background: #2D572C;">Observaciones</button>
                </div>
                <div class="w-100 mt-3">
                    <a href="./php/logout.php" class="btn btn-danger">Cerrar Sesión</a>
                </div>
            </div>
        </div>
        <div class="col-md-9 position-absolute bg-light  h-100" style="right: 0; top: 0px;">
            <?php
                if(isset($_GET['busqueda'])){
                    switch ($variable) {
                        case 'rot':
                            break;
                        case 'fija':
                            break;
                        default:
                            include('./views/main-votante.php');
                            break;
                    }
                } else {
                    include('./views/main-votante.php');
                }
            ?>
        </div>
    </div>
    <!--CSS BOOTSTRAP-->
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