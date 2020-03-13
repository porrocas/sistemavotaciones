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
            <h6 class="w-100 text-center">Votos totales para todos los candidatos</h6>
            <canvas class="col-md-12" id="myChart1"></canvas>
            <p class="w-100 text-center mt-2">Votos totales por si: <?php echo $vps ?></p>
            <p class="w-100 text-center" style="margin-top: -20px">Votos totales por no: <?php echo $vpn ?></p>
        </div>
    </div>
</div>
    <?php 
    ?>
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

