<?php
require_once "../config/Conexion.php";
class Tipopago{
    public function __construct(){

    }
    public function insertar($nombre){
        $sql = "INSERT INTO tipopago (nombre) VALUES ('$nombre')";
        return ejecutarConsulta($sql);
    }
    public function editar($idTipoP,$nombre){
        $sql = "UPDATE tipopago SET nombre='$nombre' WHERE idTipoP='$idTipoP'";
        return ejecutarConsulta($sql);
    }
    public function mostrar($idTipoP){
        $sql = "SELECT * FROM tipopago WHERE idTipoP = '$idTipoP'";
        return ejecutarConsultaSimpleFila($sql);
    }
    public function listar(){
        $sql = "SELECT * FROM tipopago";
        return ejecutarConsulta($sql);
    }

}
?>