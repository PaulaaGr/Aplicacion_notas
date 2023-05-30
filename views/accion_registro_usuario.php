<?php
require '../models/usuario.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/usuariosController.php';

use estudiante\Estudiante;
use usuarioController\UsuarioController;

$estudiante = new Estudiante();

$estudiante->setCodigo($_POST['codigo']);
$estudiante->setNombre($_POST['nombres']);
$estudiante->setApellido($_POST['apellidos']);

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