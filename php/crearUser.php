<?php
    if(isset($_POST['btnCrear'])){
        $name = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cargo = $_POST['cargo'];
        $user = $_POST['usuario'];
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

        require('./config/con-auth.php');

        $crearUser = $conn->query("INSERT INTO usuarios (cargo, nombres, apellidos, user, pass, rol) VALUES ('$cargo','$name','$apellido','$user','$pass','votante')");

        if($crearUser){
            header('location: ../admin.php?page=crear&userCreate=success');
        } else {
            header('location: ../admin.php?page=crear&userCreate=failed');
        }
    }