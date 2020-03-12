<?php
    session_start();
    if(isset($_SESSION['rol'])){
        switch ($_SESSION['rol']) {
            case 'votante':
                header('location: ./dashboard.php');
                break;
            case 'moderador':
                header('location: ./admin.php');
                break;
            default:
                session_destroy();
                header('location: ./login.php');
                break;
        }
    } else {
        session_destroy();
        header('location: ./login.php');
    }