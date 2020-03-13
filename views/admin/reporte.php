<div class="w-100 h-100 d-flex justify-content-center align-items-center flex-wrap">

    <div class="jumbotron w-100">
        <h1 class="display-4 text-success">Reporte de votos del comité de autonomías</h1>
        <p class="lead">A continuación se presentaran los resultados de las votaciones del comité de autonomías.</p>
        <hr class="my-4">
        <p class="text-muted">Prohibida la divulgación de este documento sin previa autorización.</p>
    </div>

    <div class="row w-100 d-flex justify-content-center mb-3">
        <div class="card text-white bg-info m-2" style="max-width: 14rem;">
            <div class="card-header">Numero de votantes</div>
            <div class="card-body">
                <h5 class="card-title text-center w-100"> <?php echo $numeroVotantes ?> <img src="./img/law.png"
                        class="ml-3" width="50px" height="50px" alt=""> </h5>
                <p class="card-text">es el numero de integrantes del comité de votación</p>
            </div>
        </div>
        <div class="card text-white bg-success m-2" style="max-width: 14rem;">
            <div class="card-header">Numero de candidatos</div>
            <div class="card-body">
                <h5 class="card-title text-center w-100"><?php echo $numeroCandidatos ?> <img src="./img/pilot.png"
                        class="ml-3" width="50px" height="50px" alt=""> </h5>
                <p class="card-text">Es el numero de candidatos que se encuentren participando</p>
            </div>
        </div>
        <div class="card text-white bg-danger m-2" style="max-width: 14rem;">
            <div class="card-header">Numero de votos</div>
            <div class="card-body">
                <h5 class="card-title text-center w-100"><?php echo $numeroVotos ?> <img src="./img/pencil.png"
                        class="ml-3" width="50px" height="50px" alt=""> </h5>
                <p class="card-text">Numero de votos hechos por el comité de votación</p>
            </div>
        </div>
        <div class="card text-white bg-warning m-2" style="max-width: 14rem;">
            <div class="card-header">Numero de observaciones</div>
            <div class="card-body">
                <h5 class="card-title text-center w-100"><?php echo $numObs ?> <img src="./img/sid-view.png"
                        class="ml-3" width="50px" height="50px" alt=""> </h5>
                <p class="card-text">Es el numero de observaciones hechas a candidatos por el comité de votación</p>
            </div>
        </div>
    </div>
    <div class="row w-100 d-flex justify-content-around">
        <div class="d-flex flex-wrap border d-flex justify-content-center mb-3" style="width: 50%">
            <h6 class="w-100 text-center">Votos totales:</h6>
            <canvas class="col-md-12" id="myChart1"></canvas>
            <p class="w-100 text-center mt-2">Votos totales por si: <?php echo $vps ?></p>
            <p class="w-100 text-center" style="margin-top: -20px">Votos totales por no: <?php echo $vpn ?></p>
        </div>
    </div>

    <div class="w-100 d-flex flex-wrap justify-content-around mx-auto">

    <?php 
        // id de candidatos
        $datosDeVotos1 = $conn->query("SELECT id FROM candidato");
        $idDelCand = array();
        foreach ($datosDeVotos1 as $key) {
            $indexName = 'id-' . $key['id'];
            array_push($idDelCand, $indexName);
        }

        // votos por si
        $datosDeVotos1 = $conn->query("SELECT id_candidato, count(*) FROM votos WHERE votos='si' GROUP BY id_candidato");
        $datosdeVotosPorSi = array();

        foreach ($datosDeVotos1 as $key) {
            $indexName = 'id-' . $key['id_candidato'];
            $datosdeVotosPorSi[$indexName] = $key['count(*)'];
        }

        // votos por no
        $datosDeVotos2 = $conn->query("SELECT id_candidato, count(*) FROM votos WHERE votos='no' GROUP BY id_candidato");
        $datosdeVotosPorNo = array();

        $votosContados = array();

        foreach ($datosDeVotos2 as $key) {
            $indexName = 'id-' . $key['id_candidato'];
            $datosdeVotosPorNo[$indexName] = $key['count(*)'];
        }

        foreach($idDelCand as $id){
            if(array_key_exists($id, $datosdeVotosPorSi) && array_key_exists($id, $datosdeVotosPorNo)){
                $votosS = $datosdeVotosPorSi[$id];
                $votosN = $datosdeVotosPorNo[$id];
                $votosContados[$id] = $votosS - $votosN;
            } else {
                if(array_key_exists($id, $datosdeVotosPorSi)){
                    $votosS = $datosdeVotosPorSi[$id];
                    $votosContados[$id] = $votosS;
                } else {
                    if(array_key_exists($id, $datosdeVotosPorNo)){
                        $votosN = $datosdeVotosPorNo[$id];
                        $votosN = -1*$votosN;
                        $votosContados[$id] = $votosN;
                    }
                }
                
            }
        }

        $resultadoVotosId = array();
        $resultadoVotos = array();

        foreach($votosContados as $key => $value){
            $id = explode('-', $key);
            $datoPersona = $conn->query("SELECT * FROM candidato WHERE id='$id[1]'");
            foreach($datoPersona as $informacion){
                if($value > 0){ 
                    $resultadoVotosId[$key] = $key;                       
                    $resultadoVotos[$key] = 'aprobado';                       
                    echo 
                    '
                        <div class="card border-success m-2" style="max-width: 18rem;">
                            <div class="card-header text-success">Aprobado</div>
                            <div class="card-body text-success">
                                <div class="w-100-d-flex-justify-content-center">
                                    <img src="'.$informacion['rutaFoto'].'" alt="" width="100px" class="mx-auto my-2">
                                </div>
                                <h5 class="card-title ">'.$informacion['nombre'].'</h5>
                                <p class="card-text"> Linea: '.$informacion['linea'].'</p>
                                <p class="card-text"> Aspirante a piloto de '.$informacion['tipoPiloto'].'</p>
                            </div>
                        </div>
                    ';
                } else {
                    if($value == 0){
                        $resultadoVotosId[$key] = $key;                       
                        $resultadoVotos[$key] = 'Empate de votos';                       
                        echo 
                        '
                            <div class="card border-warning m-2" style="max-width: 18rem;">
                                <div class="card-header text-warning">Igualdad En Votos</div>
                                <div class="card-body text-warning">
                                    <div class="w-100-d-flex-justify-content-center">
                                        <img src="'.$informacion['rutaFoto'].'" alt="" width="100px" class="mx-auto my-2">
                                    </div>
                                    <h5 class="card-title ">'.$informacion['nombre'].'</h5>
                                    <p class="card-text"> Linea: '.$informacion['linea'].'</p>
                                    <p class="card-text"> Aspirante a piloto de '.$informacion['tipoPiloto'].'</p>
                                </div>
                            </div>
                        ';
                    } else {
                        $resultadoVotosId[$key] = $key;                       
                        $resultadoVotos[$key] = 'Rechazado';                       
                        echo 
                        '
                            <div class="card border-danger m-2" style="max-width: 18rem;">
                                <div class="card-header text-danger">Rechazado</div>
                                <div class="card-body text-danger">
                                    <div class="w-100-d-flex-justify-content-center">
                                        <img src="'.$informacion['rutaFoto'].'" alt="" width="100px" class="mx-auto my-2">
                                    </div>
                                    <h5 class="card-title ">'.$informacion['nombre'].'</h5>
                                    <p class="card-text"> Linea: '.$informacion['linea'].'</p>
                                    <p class="card-text"> Aspirante a piloto de '.$informacion['tipoPiloto'].'</p>
                                </div>
                            </div>
                        ';
                    }
                }
            }
        }
    ?>
    </div>
    <form action="./php/index.php" method="post">
        <input type="hidden" name="resultadoVotosId" value="<?php echo implode(',', $resultadoVotosId) ?>">
        <input type="hidden" name="resultadoVotos" value="<?php echo implode(',', $resultadoVotos) ?>">
        <input type="hidden" name="numeroVotantes" value="<?php echo $numeroVotantes ?>">
        <input type="hidden" name="numeroCandidatos" value="<?php echo $numeroCandidatos ?>">
        <input type="hidden" name="numeroVotos" value="<?php echo $numeroVotos ?>">
        <input type="hidden" name="numObs" value="<?php echo $numObs ?>">
        <button class="btn btn-success btn-lg btn-block">Generar Reporte</button>
    </form>
</div>

<script>

var ctx1 = document.getElementById('myChart1').getContext('2d');
var myChart1 = new Chart(ctx1, {
  type: 'doughnut',
  data: {
    labels: ['Votos Por Si', 'Votos Por No',],
    datasets: [{
      label: '# of Tomatoes',
      data: [<?php echo $vps?>,<?php echo $vpn?>],
      backgroundColor: [
        'rgba(0, 255, 0, 0.5)',
        'rgba(255, 0, 0, 0.5)'
      ],
      borderColor: [
        'green',
        'red'
      ],
      borderWidth: 1
    }]
  },
  options: {
   	//cutoutPercentage: 40,
    responsive: true,

  }
});

</script>

