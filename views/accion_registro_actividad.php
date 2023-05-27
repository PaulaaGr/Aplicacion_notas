<?php
require '../models/actividad.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/actividadController.php';

use actividad\Actividad;
use actividadController\ActividadController;

$actividad= new Actividad();

$actividad->setId($_POST['id']);
$actividad->setDescr($_POST['descripcion']);
$actividad->setNota($_POST['nota']);
$actividad->setCodEs($_POST['codigo']);

$actividadController = new ActividadController();
$resultado = $actividadController->create($actividad);
if ($resultado) {
    echo '<h1>Actividad registrada</h1>';
} else {
    echo '<h1>No se pudo registrar la atividad</h1>';
}
?>
<br>
<a href="../index.php">Volver al inicio</a>