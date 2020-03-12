<div class="w-100 d-flex flex-wrap">
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
            <h5 class="card-title text-center w-100"> <?php echo $numeroVotos ?> <img src="./img/pencil.png" class="ml-3" width="50px"
                    height="50px" alt=""> </h5>
            <p class="card-text">Numero de votos que realizado</p>
        </div>
    </div>
    <div class="card text-white bg-warning m-2" style="max-width: 14rem;">
        <div class="card-header">Numero de observaciones</div>
        <div class="card-body">
            <h5 class="card-title text-center w-100"><?php echo $numeroObs ?> <img src="./img/sid-view.png" class="ml-3" width="50px"
                    height="50px" alt=""> </h5>
            <p class="card-text">Es el numero de observaciones que he hecho</p>
        </div>
    </div>
</div>