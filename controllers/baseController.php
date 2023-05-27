<?php namespace baseControler;

abstract class BaseController
{
    abstract function create($estudiante, $actividad);
    abstract function read();
    abstract function readAc();
    abstract function update($codigo, $estudiante);
    abstract function delete($codigo);
    abstract function readRow($codigo);



}
