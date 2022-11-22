<?php
 
 //Conexion a la base de datos
require_once "../config/conexion.php";

clasS Personal
{
    
    //Implementamos nuestro constructor
    public function __construct()
    {

    }

    // Implementamos un método para insertar registros
    public function insertar($nombre,$apellido,$ci,$sexo,$direccion,$telefono,$correo)
    {
        $sql="INSERT INTO personal (nombre,apellido,ci,sexo,direccion,telefono,correo)VALUES ('$nombre','$apellido','$ci','$sexo','$direccion','$telefono','$correo')";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método pra editar  registros
    public function editar($idPersonal,$nombre,$apellido,$ci,$sexo,$direccion,$telefono,$correo)
    {
        $sql="UPDATE personal SET nombre='$nombre',apellido='$apellido',ci='$ci',sexo='$sexo',direccion='$direccion',telefono='$telefono',correo='$correo' WHERE idPersonal='$idPersonal'";
        return ejecutarConsulta($sql);
    }

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idPersonal)
	{
		$sql="SELECT * FROM personal WHERE idPersonal='$idPersonal'";
		return ejecutarConsultaSimpleFila($sql);
	}

    //Implementamos un método para listar los registros
    public function listar()
    {
        $sql ="SELECT * FROM personal";
        return ejecutarConsulta($sql);
    }
    //Implementamos un metodo para listar personal que no tiene credenciales aun
    public function listarNoUsuario()
    {
        $sql ="SELECT * FROM personal
                WHERE idPersonal not in (select idPersonal
                                        FROM usuario
                                        )";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método par alistar los registros y mostralos en el selct
    public function select()
    {
        $sql="SELECT * FROM personal WHERE condicion=1";
        return ejecutarConsulta($sql);
    }
}

?>