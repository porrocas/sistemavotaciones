<?php
    session_start();
    $_SESSION['rol'] = '*';
    $_SESSION['user'] = '*';
    session_destroy();
    header('location: ../index.php');