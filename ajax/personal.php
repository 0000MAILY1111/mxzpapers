<?php 
require_once "../modelos/Personal.php";

$personal=new Personal();

$idPersonal = isset($_POST["idPersonal"])?limpiarCadena($_POST["idPersonal"]):"";
$ci = isset($_POST["ci"])? limpiarCadena($_POST["ci"]):"";
$nombre = isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$apellido = isset($_POST["apellido"])? limpiarCadena($_POST["apellido"]):"";
$sexo = isset($_POST["sexo"])? limpiarCadena($_POST["sexo"]):"";
$direccion = isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$telefono = isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
$correo = isset($_POST["correo"])? limpiarCadena($_POST["correo"]):"";


/*
$idPersonal ='4';
$ci='878468';
$nombre='Juan Carlos';
$apellido='May';
$sexo='M';
$direccion='calle 18';
$telefono='462658595';
$correo='juan@example.com';*/

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idPersonal)){
			$rspta=$personal->insertar($nombre,$apellido,$ci,$sexo,$direccion,$telefono,$correo);
			echo $rspta ? "Personal registrado" : "Personal no se pudo registrar";
			
		}
		else {
			$rspta=$personal->editar($idPersonal,$nombre,$apellido,$ci,$sexo,$direccion,$telefono,$correo);
			echo $rspta ? "Personal actualizado" : "Personal no se pudo actualizar";
		}
	break;

	case 'mostrar':
		$rspta=$personal->mostrar($idPersonal);
		//Codificar el resultado utilizando json
		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$personal->listar();
 		//Vamos a declarar un array
		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idPersonal.')"><i class="fa fa-pen"></i></button>',
                "1"=>$reg->nombre,
				"2"=>$reg->apellido,
				"3"=>$reg->ci,
                "4"=>$reg->sexo,
                "5"=>$reg->direccion,
                "6"=>$reg->telefono,
                "7"=>$reg->correo
 			
 			);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
}
?>