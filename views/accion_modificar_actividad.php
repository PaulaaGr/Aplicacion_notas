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
$codigo = $_POST['codigo'];
    

$actividadController = new ActividadController();
$resultado = $actividadController->update($actividad->getId(),$actividad);
if ($resultado) {
    echo '<h1>Actividad modificada</h1>';
} else {
    echo '<h1>No se pudo modificar la actividad</h1>';
}
?>
<br>
<a href="../indexAc.php?codigo=<?php echo $codigo; ?>"> lista de actividades</a>