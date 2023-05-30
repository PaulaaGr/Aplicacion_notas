<?php namespace baseControler;

abstract class BaseController
{
    abstract function create($estudiante);
    abstract function read();
    abstract function update($id, $codigo);
    abstract function delete($codigo);




}
