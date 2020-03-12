<?php
    function valoresConDB($solicitud) // FUNCION DE VALORES DE CONEXION A DB
    {
        switch ($solicitud)
        {
            case 'server':
                return "31.220.17.208";
                break;
            case 'user':
                return "xqmpqgqg_wp758";
                break;
            case 'password':
                return "Crooked13*";
                break;
            case 'db':
                return "xqmpqgqg_votaciones";
                break;
            default:
                echo "valor no existe";
            break;
        }
    }

  $conn = new mysqli(valoresConDB("server"), valoresConDB("user"), valoresConDB("password"), valoresConDB("db")); // CONEXIÓN A BASE DE DATOS
