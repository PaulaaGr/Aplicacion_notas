<?php
require 'models/usuario.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/usuariosController.php';

use usuarioController\UsuarioController;

$usuarioController = new UsuarioController();

$estudiantes = $usuarioController->read();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <main>
        <h1>Lista de estudiantes</h1>
        <a href="views/form_usuario.php">Registrar estudiante</a>
        <table>
            <thead>
                <tr>
                    <th>CODIGO</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($estudiantes as $estudiante) {
                    echo '<tr>';
                    echo '  <td>' . $estudiante->getCodigo() . '</td>';
                    echo '  <td>' . $estudiante->getNombre() . '</td>';
                    echo '  <td>' . $estudiante->getApellido() . '</td>';
                    echo '  <td>';
                    echo '      <a href="views/form_usuario.php?codigo=' . $estudiante->getCodigo() . '">modificar</a>';
                    echo '      <a href="views/accion_borrar_usuario.php?codigo=' . $estudiante->getCodigo() . '">borrar</a>';
                    echo '      <a href="indexAc.php?codigo=' . $estudiante->getCodigo() . '">Actividades</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>