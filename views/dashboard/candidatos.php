<div class="w-100 d-flex flex-wrap justify-content-center">
    <?php

        if(isset($_GET['busqueda'])){
            $tipoAla = $_GET['busqueda'];
            if(isset($_GET['linea'])){
                $linea = $_GET['linea'];
                $datosCandidatos = $conn->query("SELECT * FROM candidato WHERE linea='$linea' AND ala='$tipoAla'");
            } else {
                $datosCandidatos = $conn->query("SELECT * FROM candidato WHERE ala='$tipoAla'");
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
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex flex-wrap justify-content-center align-items-center">
                            <img src="'.$infoCan['rutaFoto'].'" class="mx-auto" width="90% alt="'.$infoCan['rutaFoto'].'">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">'.$infoCan['nombre'].'</h5>
                                <p class="card-text">Ala '.$ala.'</p>
                                <p class="card-text" style="margin-top: -20px">Linea: '.$infoCan['linea'].'</p>
                                <p class="card-text" style="margin-top: -20px">Piloto: '.$infoCan['tipoPiloto'].'</p>
                                <form action="dashboard.php" method="get">
                                    <input type="hidden" name="busqueda" value="detalles">
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