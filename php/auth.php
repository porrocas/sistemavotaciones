<?php
    if(isset($_POST['btnAuth'])){
        require('./config/con-auth.php');
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $consulta = $conn->query("SELECT * FROM usuarios WHERE user='$user'");
        if(mysqli_num_rows($consulta) != 0){
            foreach($consulta as $info){
                if(password_verify($pass, $info['pass'])){
                    session_start();
                    $_SESSION['nombre'] = $info['nombres'];
                    $_SESSION['apellido'] = $info['apellidos'];
                    $_SESSION['user'] = $info['user'];
                    $_SESSION['rol'] = $info['rol'];
                    header('location: ../index.php');
                } else {
                    session_start();
                    $_SESSION['rol'] = '*';
                    session_destroy();
                    header('location: ../login.php?login=FailedForPass');
                }
            }
        } else {
            session_start();
            $_SESSION['rol'] = '*';
            session_destroy();
            header('location: ../login.php?login=FailedForUser');
        }
        $conn->close();
    } else {
        session_start();
        $_SESSION['rol'] = '*';
        session_destroy();
        http_response_code(500);
        header('location: ../login.php?login=FailedForError');
    }
