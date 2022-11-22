<?php
require_once '../config/Conexion.php';

class Usuario
{
    public function __construct()
    {

    }

    //Implementamos  un métod para insertar registro en la tabla USUARIO
    public function insertar($nombreUsuario, $contrasena, $idRol, $idPersonal, $estado)
    {
        $contraencriptado = md5($contrasena); // metodo  de encriptacioin de contraseña
        $sql = "INSERT INTO usuario (nombreUsuario,contrasena,idRol,idPersonal,estado) VALUES
            ('$nombreUsuario','$contraencriptado','$idRol','$idPersonal','$estado')";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para editar los registros en  la tabla USUARIO
    public function editar($idUsuario, $nombreUsuario, $contrasena, $idRol, $idPersonal, $estado)
    {
        
        $sql = "UPDATE usuario SET nombreUsuario='$nombreUsuario',contrasena='$contrasena',idRol='$idRol',
            idPersonal='$idPersonal',estado='$estado' WHERE idUsuario='$idUsuario'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idUsuario)
    {
        $sql = "SELECT * FROM usuario WHERE idUsuario='$idUsuario'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementamos un método para listar los registros
    public function listar()
    {
        $sql = "SELECT u.idUsuario,u.idPersonal,p.nombre as nombrepersonal, u.nombreUsuario, u.idRol,
                u.contrasena, u.estado FROM usuario u INNER JOIN personal p ON  u.idPersonal=p.idPersonal";
        return ejecutarConsulta($sql);
    }

    	//Implementamos un método para desactivar categorías
	public function desactivar($idUsuario)
	{
		$sql="UPDATE usuario SET estado='0' WHERE idUsuario='$idUsuario'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idUsuario)
	{
		$sql="UPDATE usuario SET estado='1' WHERE idUsuario='$idUsuario'";
		return ejecutarConsulta($sql);
	}

    //Implementamos un método par alistar los registros y mostralos en el select
    public function select()
    {
        $sql = "SELECT * FROM usuario WHERE estado='1'";
        return ejecutarConsulta($sql);
    }

    //Función para verificar el acceso al sistema
    public function verificar($login, $clave)
    {
        $sql = "SELECT idUsuario,nombreUsuario,idPersonal,estado FROM usuario WHERE nombreUsuario='$login' AND contrasena='$clave' AND estado='1'";
        return ejecutarConsulta($sql);
    }
}


?>