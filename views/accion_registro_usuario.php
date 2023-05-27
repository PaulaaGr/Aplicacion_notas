<?php
require '../models/usuario.php';
require '../models/actividad.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/usuariosController.php';

use estudiante\Estudiante;
use actividad\Actividad;
use usuarioController\UsuarioController;

$estudiante = new Estudiante();
//$actividad = new Actividad();

$estudiante->setCodigo($_POST['codigo']);
$estudiante->setNombre($_POST['nombres']);
$estudiante->setApellido($_POST['apellidos']);
//$actividad -> setCodEs($_POST['codigo']);

$usuarioController = new UsuarioController();
$resultado = $usuarioController->create($estudiante);
if ($resultado) {
    echo '<h1>Estudiante registrado</h1>';
} else {
    echo '<h1>No se pudo registrar el estudiante</h1>';
}
?>
<br>
<a href="../index.php">Volver al inicio</a>