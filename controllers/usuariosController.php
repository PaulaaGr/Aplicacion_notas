<?php

namespace usuarioController;

use baseControler\BaseController;
use conexionDb\ConexionDbController;
use estudiante\Estudiante;
use actividad\Actividad;

class UsuarioController extends BaseController
{

    function create($estudiante, $actividad)
    {
        $sql = 'insert into estudiantes ';
        $sql .= '(codigo,nombres,apellidos) values ';
        $sql .= '(';
        $sql .= $estudiante->getCodigo() . ',';
        $sql .= '"' . $estudiante->getNombre() . '",';
        $sql .= '"' . $estudiante->getApellido() . '",';
        $sql .= ')';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();

        $sql2 = 'insert into actividades ';
        $sql2 .= '(id,descripcion,nota,CodigoEstudiante) values ';
        $sql2 .= '(';
        $sql2 .= $actividad->getId() . ',';
        $sql2 .= '"' . $actividad->getDescr() . '",';
        $sql2 .= '"' . $actividad->getNota() . '",';
        $sql2 .= '"' . $estudiante->getCodigo() . '",';
        $sql2 .= ')';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $resultadoSQL2 = $conexiondb->execSQL($sql2);
        $conexiondb->close();

        if ($resultadoSQL && $resultadoSQL2) {
            return true;
        } else {
            return false;
        }
    }


    function read()
    {
        $sql = 'select * from estudiantes';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $estudiantes = [];
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $estudiante = new Estudiante();
            $estudiante->setCodigo($registro['codigo']);
            $estudiante->setNombre($registro['nombres']);
            $estudiante->setApellido($registro['apellidos']);
            array_push($estudiantes, $estudiante);
        }
        $conexiondb->close();
        return $estudiantes;
    }

    function readAc()
    {
        $sql = 'select * from actividades';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $actividades = [];
        while ($registro2 = $resultadoSQL->fetch_assoc()) {
            $actividad = new Actividad();
            $actividad->setId($registro2['id']);
            $actividad->setDescr($registro2['descripcion']);
            $actividad->setNota($registro2['nota']);
            array_push($actividades, $actividad);
        }
        $conexiondb->close();
        return $actividades;
    }

    function readRow($codigo)
    {
        $sql = 'select * from estudiantes';
        $sql .= ' where codigo=' . $codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $estudiante = new Estudiante();
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $estudiante->setCodigo($registro['codigo']);
            $estudiante->setNombre($registro['nombres']);
            $estudiante->setApellido($registro['apellidos']);
        }
        $conexiondb->close();
        return $estudiante;
    }

    function readRowAc($codigo)
    {
        $sql = 'select * from estudiantes';
        $sql .= ' where codigoEstudiante=' . $codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $actividad = new Actividad();
        while ($registro2 = $resultadoSQL->fetch_assoc()) {
            $actividad->setDescr($registro2['descripcion']);
            $actividad->setNota($registro2['nota']);
        }
        $conexiondb->close();
        return $actividad;
    }

    function update($codigo, $estudiante)
    {
        $sql = 'update estudiantes set ';
        $sql .= 'nombres=' . $estudiante->getNombre() . '",';
        $sql .= 'apellidos=' . $estudiante->getApellido() . '",';
        $sql .= ' where codigo=' . $codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    function delete($codigo)
    {
        $sql = 'delete from estudiantes where codigo=' . $codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    function deleteAc($codigo)
    {
        $sql = 'delete from actividades where codigoEstudiante=' . $codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }
    
}

