<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Sistema de votación comité Autonomías</title>
    <style>
        .margin-top-menos{
            margin-top: -10px;
        }
        .pie{
            width: 100%;
            padding: 20px 0px;
            color: white;
            background: green;
        }
    </style>
</head>

<body>
    
    <h1>Reporte de votos del comité de autonomías</h1>
    <p>A continuación se presentaran los resultados de las votaciones del comité de autonomías.</p>
    <small>Prohibida la divulgación de este documento sin previa autorización.</small>
    <br>
    <h1>Resultados:</h1>
    <p class="margin-top-menos">Números de candidatos: <?php echo $_POST['numeroCandidatos'] ?></p>
    <p class="margin-top-menos">Numero de integrantes del comité: <?php echo $_POST['numeroVotantes'] ?></p>
    <p class="margin-top-menos">Votos Hechos: <?php echo $_POST['numeroVotos'] ?></p>
    <p class="margin-top-menos">Observaciones Hechas: <?php echo $_POST['numObs'] ?></p>
    <?php
        require('./config/con-auth.php');
        $datosCandidatos = $conn->query('SELECT * FROM candidato');
        $resultadoVotosId = explode(',',$_POST['resultadoVotosId']);
        $resultadoVotos = explode(',',$_POST['resultadoVotos']);
        $contador = 0;
        foreach($resultadoVotosId as $valor){
            $id = explode('-', $valor);
            $idBuscar = $id[1];
            $consulta = $conn->query("SELECT * FROM candidato WHERE id='$idBuscar'");
            foreach($consulta as $datos){
                echo 
                    '
                    <h4>'.$resultadoVotos[$contador].'</h4> 
                    <p class="margin-top-menos">Nombre: '.$datos['nombre'].'</p>
                    <p class="margin-top-menos">Grado: '.$datos['grado'].'</p>
                    <p class="margin-top-menos">Candidato a piloto: '.$datos['tipoPiloto'].'</p>
                    <p class="margin-top-menos">linea: '.$datos['linea'].'</p>
                    ';
            }
            $contador++;
        }
    ?>
    <p class="pie">Sistema de votación | comité de autonomías | Desarrollador de plataforma tecnológica = " +57 3166989045 "</p>
</body>
</html>