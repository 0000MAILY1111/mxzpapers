<?php
require_once "../modelos/Cliente.php";

$cliente = new Cliente();

$idCliente = isset($_POST["idCliente"])?limpiarCadena($_POST["idCliente"]):"";
$nombre = isset($_POST["nombre"])?limpiarCadena($_POST["nombre"]):"";
$sexo = isset($_POST["sexo"])?limpiarCadena($_POST["sexo"]):"";
$telefono = isset($_POST["telefono"])?limpiarCadena($_POST["telefono"]):"";

/*
$idCliente='2';
$nombre='Albhertt Betthoben';
$sexo='M';
$telefono='7846461';
*/
switch($_GET["op"]){
    case 'guardaryeditar':
        if(empty($idCliente)){
            $rspta = $cliente->insertar($nombre,$sexo,$telefono);
            echo $rspta ? "Cliente registrado" : "No se pudo registrar";
        }
        else{
            $rspta=$cliente->editar($idCliente,$nombre,$sexo,$telefono);
            echo $rspta ? "Cliente actualizado" : "No se pudo actualizar";
        }
    break;

	case 'mostrar':
		$rspta=$cliente->mostrar($idCliente);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

    case 'listar':
        $rspta=$cliente->listar();
        $data = Array();

        while($reg = $rspta->fetch_object()){
            $data[]=array(
                "0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idCliente.')"><i class="fa fa-pen"></i></button>',
                "1"=>$reg->nombre,
                "2"=>$reg->sexo,
                "3"=>$reg->telefono
            );
        }
        $results = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data
        );
        echo json_encode($results);
    break;

}

?>