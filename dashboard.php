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
</head>
<body>
    <?php echo '<p> '. $rol .' </p>' ?>
</body>
</html>