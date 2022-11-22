<?php
require_once "../config/Conexion.php";
class Cliente{

    public function __construct(){

    }
  
    public function insertar($nombre,$sexo,$telefono){
        $sql = "INSERT INTO cliente (nombre,sexo,telefono) VALUES ('$nombre','$sexo','$telefono')";
        return ejecutarConsulta($sql);

    }
    public function editar($idCliente,$nombre,$sexo,$telefono){
        $sql = "UPDATE cliente SET nombre='$nombre',sexo='$sexo',telefono='$telefono' WHERE idCliente='$idCliente'";
        return ejecutarConsulta($sql);
    }

   	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idCliente)
	{
		$sql="SELECT * FROM cliente WHERE idCliente='$idCliente'";
		return ejecutarConsultaSimpleFila($sql);
	}
    public function listar(){
        $sql = "SELECT * FROM cliente";
        return ejecutarConsulta($sql);
    }
}

?>