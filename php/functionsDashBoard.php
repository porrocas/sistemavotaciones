<?php
    $usuarioLog = $_SESSION['user'];
    $idJuez = $_SESSION['idLog'];

    require('./php/config/con-auth.php');

    $consultarUser1 = $conn->query("SELECT rol FROM usuarios WHERE rol='votante'");
    $consultarUser2 = $conn->query("SELECT * FROM candidato");
    $consultarUser3 = $conn->query("SELECT * FROM votos WHERE id_jurado='$idJuez'");

    $numeroVotantes = 0;
    $numeroCandidatos = 0;
    $numeroVotos = 0;
    $numeroObs = 0;

    if($consultarUser1 && $consultarUser2){
        
        foreach($consultarUser1 as $infoUser){
            $numeroVotantes++;
        }

        foreach($consultarUser2 as $infoUser){
            $numeroCandidatos++;
        }

        foreach($consultarUser3 as $infoUser){
            $numeroVotos++;
            if($infoUser['observaciones'] == 'Ninguna.'){
                $numeroObs++;
            }
        }
    }else{
        http_response_code(500);
    }
?>