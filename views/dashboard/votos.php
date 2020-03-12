<dvi class="row">
    <?php
        $idBusqueda = $_SESSION['idLog'];
        $conDatosVotos = $conn->query("SELECT * FROM votos WHERE id_jurado='$idBusqueda'");
        foreach ($conDatosVotos as $bus) {
            $idCand = $bus['id_candidato'];
            $conDatosCand = $conn->query("SELECT * FROM candidato WHERE id='$idCand'");
            foreach($conDatosCand as $infoC){
                if($bus['votos'] == 'si'){
                    echo 
                    '
                        <div class="col-md-5 d-flex flex-wrap justify-content-around align-items-center border m-3">
                            <div class="col-md-6 my-2">
                                <img src="'.$infoC['rutaFoto'].'" alt="'.$infoC['nombre'].'" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <p>'.$infoC['nombre'].'</p>
                                <p style="margin-top: -10px">'.$infoC['linea'].'</p>
                                <h5 style="color: green">Mi Voto: '.$bus['votos'].'</h5>
                            </div>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning btn-block mb-2" data-toggle="modal" data-target="#d'.$infoC['id'].'">
                                Modificar Voto
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="d'.$infoC['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modificar voto de '.$infoC['nombre'].'</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form class="w-100" action="./php/modificarVoto.php" method="post">
                                <input type="hidden" name="idJurado" value="'.$_SESSION['idLog'].'">
                                <input type="hidden" name="idVoto" value="'.$bus['id'].'">
                                <input type="hidden" name="idCandidato" value="'.$infoCan['id'].'">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Agregar Observaciones:</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="observacion" rows="3" required>'.$bus['observaciones'].'</textarea>
                                </div>
                                <fieldset class="form-group">
                                    <div class="row">
                                        <legend class="col-form-label col-sm-2 pt-0">Voto</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="voto" id="gridRadios1" value="si" required>
                                                <label class="form-check-label" for="gridRadios1">
                                                    SI
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="voto" id="gridRadios2" value="no" required>
                                                <label class="form-check-label" for="gridRadios2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group row">
                                    <div class="col-md-6">Estoy seguro de mi voto!</div>
                                    <div class="col-md-6 mx-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck1" required>
                                            <label class="form-check-label" for="gridCheck1">
                                                Seguro
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 mx-auto">
                                        <button type="submit" name="btnVoto" class="btn btn-primary btn-block btn-lg">Votar</button>
                                    </div>
                                </div>
                            </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    ';
                } else {
                    echo 
                    '
                        <div class="col-md-5 d-flex flex-wrap justify-content-around align-items-center border m-3">
                            <div class="col-md-6 my-2">
                                <img src="'.$infoC['rutaFoto'].'" alt="'.$infoC['nombre'].'" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <p>'.$infoC['nombre'].'</p>
                                <p style="margin-top: -10px">'.$infoC['linea'].'</p>
                                <h5 style="color: red">Mi Voto: '.$bus['votos'].'</h5>
                            </div>
                            <button type="button" class="btn btn-warning btn-block mb-2" data-toggle="modal" data-target="#d'.$infoC['id'].'">
                                Modificar Voto
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="d'.$infoC['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modificar voto de '.$infoC['nombre'].'</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form class="w-100" action="./php/modificarVoto.php" method="post">
                                <input type="hidden" name="idJurado" value="'.$_SESSION['idLog'].'">
                                <input type="hidden" name="idVoto" value="'.$bus['id'].'">
                                <input type="hidden" name="idCandidato" value="'.$infoCan['id'].'">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Agregar Observaciones:</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="observacion" rows="3" required>'.$bus['observaciones'].'</textarea>
                                </div>
                                <fieldset class="form-group">
                                    <div class="row">
                                        <legend class="col-form-label col-sm-2 pt-0">Voto</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="voto" id="gridRadios1" value="si" required>
                                                <label class="form-check-label" for="gridRadios1">
                                                    SI
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="voto" id="gridRadios2" value="no" required>
                                                <label class="form-check-label" for="gridRadios2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group row">
                                    <div class="col-md-6">Estoy seguro de mi voto!</div>
                                    <div class="col-md-6 mx-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck1" required>
                                            <label class="form-check-label" for="gridCheck1">
                                                Seguro
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 mx-auto">
                                        <button type="submit" name="btnVoto" class="btn btn-primary btn-block btn-lg">Votar</button>
                                    </div>
                                </div>
                            </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    ';
                }
            }
        }
    ?>
</dvi>

