<?php 
require_once "../modelos/Permiso.php";

$permiso=new Permiso();

//$idPermiso = isset($_POST["idPermiso"])?limpiarCadena($_POST["idPermiso"]):"";
$nombre = isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";

$idPermiso='1';
switch ($_GET["op"]){
	

	case 'mostrar':
		$rspta=$permiso->mostrar($idPermiso);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$permiso->listar();
 		//Vamos a declarar un array
		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(

                "0"=>$reg->idPermiso,
                "1"=>$reg->nombre,
        
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