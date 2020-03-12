<?php
    $usuarioLog = $_SESSION['user'];

    require('./php/config/con-auth.php');

    $consultarUser1 = $conn->query("SELECT rol FROM usuarios WHERE rol='votante'");
    $consultarUser2 = $conn->query("SELECT * FROM candidato");

    $conn->close();

    $numeroVotantes = 0;
    $numeroCandidatos = 0;

    if($consultarUser1 && $consultarUser2){
        
        foreach($consultarUser1 as $infoUser){
            $numeroVotantes++;
        }

        foreach($consultarUser2 as $infoUser){
            $numeroCandidatos++;
        }
    }else{
        http_response_code(500);
    }
?>