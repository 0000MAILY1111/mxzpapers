<?php
 
 //Conexion a la base de datos
require_once "../config/conexion.php";

clasS Permiso
{
    
    //Implementamos nuestro constructor
    public function __construct()
    {

    }

    //Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idPermiso)
	{
		$sql="SELECT * FROM permiso WHERE idPermiso='$idPermiso'";
		return ejecutarConsultaSimpleFila($sql);
	}
    //Implementamos un método para listar permisos
    public function listar()
    {
        $sql ="SELECT * FROM permiso";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método par alistar los permisos y mostralos en el selct
    public function select()
    {
        $sql="SELECT * FROM permiso WHERE condicion=1";
        return ejecutarConsulta($sql);
    }
}

?>