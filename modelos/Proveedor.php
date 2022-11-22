<?php
 
 //Conexion a la base de datos
require_once "../config/conexion.php";

clasS Proveedor
{
    
    //Implementamos nuestro constructor
    public function __construct()
    {

    }

    // Implementamos un método para insertar registros
    public function insertar($nombre,$telefono,$descripcion)
    {
        $sql="INSERT INTO proveedor (nombre,telefono,descripcion)VALUES ('$nombre','$telefono','$descripcion')";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método pra editar  registros
    public function editar($idProveedor,$nombre,$descripcion,$telefono)
    {
        $sql="UPDATE proveedor SET nombre='$nombre',telefono='$telefono',descripcion='$descripcion' WHERE idProveedor='$idProveedor'";
        return ejecutarConsulta($sql);
    }

    public function eliminar($idProveedor)
    {
        $sql="DELETE FROM `proveedor` WHERE `proveedor`.`idProveedor` = '$idProveedor'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para mostrar los datos de un registro
    public function mostrar ($idProveedor)
    {
        $sql="SELECT * FROM proveedor WHERE idProveedor='$idProveedor'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementamos un método para listar los registros
    public function listar()
    {
        $sql ="SELECT * FROM proveedor";
        return ejecutarConsulta($sql);
    }
}



?>