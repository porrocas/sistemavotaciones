<?php
    $usuarioLog = $_SESSION['user'];

    require('./php/config/con-auth.php');

    $consultarUser1 = $conn->query("SELECT rol FROM usuarios WHERE rol='votante'");
    $consultarUser2 = $conn->query("SELECT * FROM candidato");
    $consultarUser3 = $conn->query("SELECT id, votos FROM votos");
    $consultarUser4 = $conn->query("SELECT id FROM votos WHERE NOT observaciones='Ninguna.'");

    $conn->close();

    $numeroVotantes = 0;
    $numeroCandidatos = 0;
    $numeroVotos = 0;
    $numObs = 0;

    $vps = 0;
    $vpn = 0;

    foreach($consultarUser3 as $votos){
        if($votos['votos'] == 'si'){
            $vps++;
        } else {
            $vpn++;
        }
    }

    foreach($consultarUser3 as $votos){
        $numeroVotos++;
    }
    foreach($consultarUser4 as $votos){
        $numObs++;
    }

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