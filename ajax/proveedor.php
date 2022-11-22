<?php 
require_once "../modelos/Proveedor.php";

$proveedor=new Proveedor();

$idProveedor = isset($_POST["idProveedor"])?limpiarCadena($_POST["idProveedor"]):"";
$nombre = isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$descripcion = isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$telefono = isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";


/*
$idProveedor='';
$nombre='MARIs';
$telefono='62528574';ssssssssss
$descripcion='distrubuidor de TEMPO';
*/


switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idProveedor)){
		
			$rspta=$proveedor->insertar($nombre,$telefono,$descripcion);
			echo $rspta ? "proveedor registrado" : "proveedor no se pudo registrar";
			
		}
		else {
		
			$rspta=$proveedor->editar($idProveedor,$nombre,$descripcion,$telefono);
			echo $rspta ? "proveedor actualizado" : "proveedor no se pudo actualizar";
		}
	break;

	case 'eliminar':
		$rspta=$proveedor->eliminar($idProveedor);
	break;

	case 'mostrar':
		$rspta=$proveedor->mostrar($idProveedor);
 		//Codificar el resultado utilizando json
		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$proveedor->listar();
 		//Vamos a declarar un array
		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
                "0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idProveedor.')"><i class="fa fa-pen"></i></button>'.
				'<button class="btn btn-danger" onclick="eliminar('.$reg->idProveedor.')"><i class="fa fa-trash"></i></button>',
                "1"=>$reg->nombre,                 
				"2"=>$reg->telefono,
				"3"=>$reg->descripcion,		
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