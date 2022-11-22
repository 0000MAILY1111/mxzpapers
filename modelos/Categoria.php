<?php
require_once "../config/Conexion.php";

class Categoria
{

    public function __construct()
    {
    }

    public function insertar($nombre)
    {
        $sql = "INSERT INTO categoria (nombre) VALUES ('$nombre')";
        return ejecutarConsulta($sql);
    }

    public function editar($idCategoria, $nombre)
    {
        $sql = "UPDATE categoria SET nombre='$nombre' WHERE idCategoria='$idCategoria'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idCategoria)
    {
        $sql = "SELECT * FROM categoria WHERE idCategoria='$idCategoria'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementamos un método para listar los registros
    public function listar()
    {
        $sql = "SELECT * FROM categoria";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para eleimianr  los registros
    public function eliminar($idCategoria)
    {
        $sql = "DELETE FROM categoria  WHERE idCategoria='$idCategoria'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método par alistar los registros y mostralos en el selct
    public function select()
    {
        $sql = "SELECT * FROM categoria WHERE condicion=1";
        return ejecutarConsulta($sql);
    }
}
