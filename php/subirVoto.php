<?php
    if(isset($_POST['btnVoto'])){
        $obs = $_POST['observacion'];
        $voto = $_POST['voto'];
        $idJurado = $_POST['idJurado'];
        $idCandidato = $_POST['idCandidato'];
        $deDondeVengo = $_POST['linkRegreso'];

        $linkRegreso = explode(',', $deDondeVengo);
        echo $deDondeVengo;
        require('./config/con-auth.php');
        
        $subirVoto = $conn->query("INSERT INTO votos(id_candidato, id_jurado, votos, observaciones) VALUES('$idCandidato','$idJurado','$voto','$obs')");

        if(count($linkRegreso) == 2){
            $link = '../dashboard.php?busqueda=' . $linkRegreso[0] . '&linea=' . $linkRegreso[1];
        } else {
            $link = '../dashboard.php?busqueda=' . $linkRegreso[0];

        }
        if($subirVoto){
            header('location: ' . $link);
        } else {
            http_response_code(500);
        }
        
    }