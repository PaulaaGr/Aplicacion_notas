<?php
require '../models/usuario.php';
require '../models/actividad.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/usuariosController.php';

use actividad\Actividad;
use usuarioController\UsuarioController;

$actividad = new Actividad();
$actividad->setId($_POST['id']);
$actividad->setDescr($_POST['descripcion']);
$actividad->setNota($_POST['nota']);

$usuarioController = new UsuarioController();
$resultado = $usuarioController->create($estudiante, $actividad);
if ($resultado) {
    echo '<h1>Usuarios registrado</h1>';
} else {
    echo '<h1>No se pudo registrar el usuario</h1>';
}
?>
<br>
<a href="../index.php">Volver al inicio</a>