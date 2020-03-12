<?php
    if(isset($_POST['btnVoto'])){
        $obs = $_POST['observacion'];
        $voto = $_POST['voto'];
        $idJurado = $_POST['idJurado'];
        $idCandidato = $_POST['idCandidato'];

        require('./config/con-auth.php');

        $subirVoto = $conn->query("INSERT INTO votos(id_candidato, id_jurado, votos, observaciones) VALUES('$idCandidato','$idJurado','$voto','$obs')");

        if($subirVoto){
            header('location: ../dashboard.php');
        } else {
            http_response_code(500);
        }
    }