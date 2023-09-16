<?php

require_once '../../modelo/jugador.php';
require_once 'responses/nuevoResponse.php';
require_once 'request/nuevoRequest.php';

header('Content-Type: application/json');
$resp = new NuevoResponse();

$json = file_get_contents('php://input',true);
$req = json_decode($json);

$cantJug = 0;
foreach ($req->ListJugadores as $j) {
    $cantJug = $cantJug +1;
}

if ($cantJug>=1 && $cantJug<=5){
    $resp->IsOk=true;
    $resp->Mensaje=" ";
} else {
    $resp->IsOk=false;
    $resp->Mensaje="El equipo posee $cantJug y debe poseer entre 1 y 5  jugadores";
}



echo json_encode($resp);

