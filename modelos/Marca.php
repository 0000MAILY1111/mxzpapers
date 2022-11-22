<?php
 
 //Conexion a la base de datos
require_once "../config/conexion.php";

clasS Marca
{
    
    //Implementamos nuestro constructor
    public function __construct()
    {

    }

    // Implementamos un método para insertar registros
    public function insertar($nombre)
    {
        $sql="INSERT INTO marca (nombre)VALUES ('$nombre')";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método pra editar  registros
    public function editar($idMarca,$nombre)
    {
        $sql="UPDATE marca SET nombre='$nombre' WHERE idMarca='$idMarca'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para desactivar pelsonal
    /*public function desactivar($idpersonal)
    {
        $sql="UPDATE marca set condicion"
    }*/

    //Implementamos un método para mostrar los datos de un registro
    public function mostrar ($idMarca)
    {
        $sql="SELECT * FROM marca WHERE idMarca='$idMarca'";
        return ejecutarConsultaSimpleFila($sql);

    }

    //Implementamos un método para listar los registros
    public function listar()
    {
        $sql ="SELECT * FROM marca";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método par alistar los registros y mostralos en el selct
    public function select()
    {
        $sql="SELECT * FROM marca WHERE condicion=1";
        return ejecutarConsulta($sql);
    }
}

?>