<div class="w-100 d-flex flex-wrap justify-content-center bg-light">
    <?php
        $idBehedor = $_SESSION['idLog'];

        $traerVotos = $conn->query("SELECT id_candidato FROM votos WHERE id_jurado = '$idBehedor'");

        $datosVerificar = array();
        foreach($traerVotos as $valor){
            array_push($datosVerificar, $valor['id_candidato']);
        }

        if(count($datosVerificar) != 0){
            $verificar = implode(',', $datosVerificar);
        } else {
            $verificar = 0;
        }
        $linkRegreso = '';

        if(isset($_GET['busqueda'])){
            $tipoAla = $_GET['busqueda'];
            if(isset($_GET['linea'])){
                $linea = $_GET['linea'];
                $linkRegreso = $tipoAla.','.$linea;
                $datosCandidatos = $conn->query("SELECT * FROM candidato WHERE linea='$linea' AND ala='$tipoAla' AND id NOT IN ($verificar)");
            } else {
                $datosCandidatos = $conn->query("SELECT * FROM candidato WHERE ala='$tipoAla' AND id NOT IN ($verificar)");
                $linkRegreso = $tipoAla;
            }
        }

        foreach($datosCandidatos as $infoCan){
            if($infoCan['ala'] == 'rot'){
                $ala = 'rotatoria';
            } else {
                $ala = 'fija';
            }
            echo 
                '
                <div class="card mb-3" style="max-width: 20rem; margin: 5px; padding: 10px">
                    <p class="card-text w-100" style="color: green; font-size: 1.5em; text-align: center;">Aspira a Piloto '.$infoCan['tipoPiloto'].'</p>
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex flex-wrap justify-content-center align-items-center">
                            <img src="'.$infoCan['rutaFoto'].'" class="mx-auto" width="90% alt="'.$infoCan['rutaFoto'].'">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">'.$infoCan['nombre'].'</h5>
                                <p class="card-text">Ala '.$ala.'</p>
                                <p class="card-text" style="margin-top: -20px">Linea: '.$infoCan['linea'].'</p>
                                <form action="dashboard.php" method="get">
                                    <input type="hidden" name="busqueda" value="detalles">
                                    <input type="hidden" name="linkRegreso" value="'.$linkRegreso.'">
                                    <input type="hidden" name="idCandidato" value="'.$infoCan['id'].'">
                                    <input type="hidden" name="idJurado" value="'.$_SESSION['idLog'].'">
                                    <button type="submit" class="btn btn-lg btn-block btn-success">Estudiar Caso</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                ';
        }

    ?>
</div>
