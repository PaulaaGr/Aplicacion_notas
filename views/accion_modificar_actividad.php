<?php
require '../models/actividad.php';
require '../models/usuario.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/actividadController.php';

use actividad\Actividad;
use actividadController\ActividadController;

$actividad = new Actividad();
$actividad->setId($_POST['id']);
$actividad->setDescr($_POST['descripcion']);
$actividad->setNota($_POST['nota']);

$usuarioController = new ActividadController();
$resultado = $usuarioController->update($actividad->getId(),$actividad);
if ($resultado) {
    echo '<h1>Usuarios modificado</h1>';
} else {
    echo '<h1>No se pudo modificar el usuario</h1>';
}
?>
<br>
<a href="../index.php">Volver al inicio</a>