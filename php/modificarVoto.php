<?php
    if(isset($_POST['btnVoto'])){
        $obs = $_POST['observacion'];
        $voto = $_POST['voto'];
        $idVoto = $_POST['idVoto'];
        $idJurado = $_POST['idJurado'];
        $idCandidato = $_POST['idCandidato'];

        require('./config/con-auth.php');

        $update = $conn->query("UPDATE votos SET votos='$voto', observaciones='$obs' WHERE id='$idVoto'");

        if($update){
            header('location: ../dashboard.php?busqueda=votos');
        } else {
            http_response_code(500);
        }
    }