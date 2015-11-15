<?php

require 'clases/AutoCarga.php';
$pacientes_SAS = '../../../pacientes_SAS';


if (!file_exists($pacientes_SAS)) {
    mkdir($pacientes_SAS, 0777, true);
}
$numTarjeta = Request::post("id_us");
$diaNac = Request::post("dia");
$mesNac = Request::post("mes");
$anioNac = Request::post("anio");
$dni = Request::post("dni");
$archivos = Request::post("imagen");
//creamos una carpeta para el usuario
$usuarioSAS = '../../../pacientes_SAS/' . $numTarjeta;
if (!file_exists($usuarioSAS)) {
    mkdir($usuarioSAS, 0777, true);
}
$subir = new UploadMultiple("imagen", $usuarioSAS . '/');
$subir->upload();
$sesion = new Session();
$pacienteSas = new PacienteSas($numTarjeta);
$sesion->set('_paciente', $pacienteSas);

if ($subir->getNumArchivos() > 0) {
    $numSubidos = $subir->getNumeroSubidos();
    $numIntentos = count($subir->getArray());
} else {
    $numSubidos = 0;
    $numIntentos = 0;
}
$sesion->set('numIntentos', $numIntentos);
$sesion->set('numSubidos', $numSubidos);

header('Location:paciente.php');








