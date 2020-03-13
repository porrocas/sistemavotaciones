<div class="w-100 d-flex flex-wrap justify-content-center">
    <?php
        if($_SESSION['idLog'] == $_GET['idJurado']){
            $idCandidato = $_GET['idCandidato'];
            $idJurado = $_GET['idJurado'];

            $datosDetalles = $conn->query("SELECT * FROM candidato WHERE id='$idCandidato'");

            foreach($datosDetalles as $infoCan){
                if($infoCan['ala'] == 'rot'){
                    $ala = 'rotatoria';
                } else {
                    $ala = 'fija';
                }
                if($infoCan['observaciones'] == 'Ninguna'){
                    echo 
                    '
                    <div class="row w-100 d-flex flex-wrap m-3 justify-content-center border p-3">
                        <div class="row d-flex flex-wrap col-md-12 justify-content-around align-items-center">
                            <div class="col-md-6 mx-auto my-3">
                                <img src="'.$infoCan['rutaFoto'].'" class="mx-auto" width="100%" alt="'.$infoCan['nombre'].'">
                            </div>
                        </div>
                        <div class="row col-md-12 d-flex flex-wrap justify-content-around align-items-center">
                            <div class="col-md-6">
                                <h5 class="w-100 text-center my-3">'.$infoCan['nombre'].'</h5>
                                <p style="margin-top: -10px">Grado: '.$infoCan['grado'].'</p>
                                <p style="margin-top: -10px">Piloto: '.$infoCan['tipoPiloto'].'</p>
                                <p style="margin-top: -10px">Antigüedad como policía: '.$infoCan['antPolicia'].' Años</p>
                                <p style="margin-top: -10px">Antigüedad Aviación: '.$infoCan['antAviacion'].' Años</p>
                                <p style="margin-top: -10px">Unidad Actual: '.$infoCan['unidadActual'].' horas</p>
                                <p style="margin-top: -10px">Horas de vuelo totales: '.$infoCan['horasTot'].' horas</p>
                                <p style="margin-top: -10px">Horas de vuelo en aeronave actual: '.$infoCan['horasAero'].'</p>
                                <p style="margin-top: -10px">Ala : '.$ala.'</p>
                                <p style="margin-top: -10px">Linea : '.$infoCan['linea'].'</p>
                            </div>
                        </div>
                        <div class="col-md-8 d-flex flex-wrap justify-content-center align-items-center">
                            <form class="w-100" action="./php/subirVoto.php" method="post">
                                <input type="hidden" name="idJurado" value="'.$_SESSION['idLog'].'">
                                <input type="hidden" name="idCandidato" value="'.$infoCan['id'].'">
                                <input type="hidden" name="linkRegreso" value="'.$_GET['linkRegreso'].'">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Agregar Observaciones:</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="observacion" rows="3" required>Ninguna.</textarea>
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
                    </div>
                    ';
                } else {
                    echo 
                    ' 
                    <div class="row w-100 d-flex flex-wrap m-3 justify-content-center border p-3">
                        <div class="row d-flex flex-wrap col-md-12 justify-content-around align-items-center">
                            <div class="col-md-6 mx-auto my-3">
                                <img src="'.$infoCan['rutaFoto'].'" class="mx-auto" width="100%" alt="'.$infoCan['nombre'].'">
                            </div>
                        </div>
                        <div class="row col-md-12 d-flex flex-wrap justify-content-around align-items-center">
                            <div class="col-md-6">
                                <h5 class="w-100 text-center my-3">'.$infoCan['nombre'].'</h5>
                                <p style="margin-top: -10px">Grado: '.$infoCan['grado'].'</p>
                                <p style="margin-top: -10px">Piloto: '.$infoCan['tipoPiloto'].'</p>
                                <p style="margin-top: -10px">Antigüedad como policía: '.$infoCan['antPolicia'].' Años</p>
                                <p style="margin-top: -10px">Antigüedad Aviación: '.$infoCan['antAviacion'].' Años</p>
                                <p style="margin-top: -10px">Unidad Actual: '.$infoCan['unidadActual'].' horas</p>
                                <p style="margin-top: -10px">Horas de vuelo totales: '.$infoCan['horasTot'].' horas</p>
                                <p style="margin-top: -10px">Horas de vuelo en aeronave actual: '.$infoCan['horasAero'].'</p>
                                <p style="margin-top: -10px">Ala : '.$ala.'</p>
                                <p style="margin-top: -10px">Linea : '.$infoCan['linea'].'</p>
                            </div>
                            <div class="card text-white bg-danger mb-3 col-md-5">
                                <div class="card-header">Nota: </div>
                                <div class="card-body">
                                    <p class="card-text">'.utf8_encode($infoCan['observaciones']).'</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 d-flex flex-wrap justify-content-center align-items-center">
                            <form class="w-100" action="./php/subirVoto.php" method="post">
                                <input type="hidden" name="idJurado" value="'.$_SESSION['idLog'].'">
                                <input type="hidden" name="idCandidato" value="'.$infoCan['id'].'">
                                <input type="hidden" name="linkRegreso" value="'.$_GET['linkRegreso'].'">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Agregar Observaciones:</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="observacion" rows="3" required>Ninguna.</textarea>
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
                    </div>
                    ';
                }
                
            }
        } else {
            http_response_code(500);
        }
    ?>
</div>

