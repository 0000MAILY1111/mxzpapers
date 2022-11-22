<?php
require "../modelos/Categoria.php";

$categoria = new Categoria();

$idCategoria = isset($_POST["idCategoria"])?limpiarCadena($_POST["idCategoria"]):"";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";


switch ($_GET["op"]) {
	case 'guardaryeditar':
        if(empty($idCategoria)){
            $rspta = $categoria->insertar($nombre);
            echo $rspta ? "Categoria registrado" : "No se pudo registrar";
        }
        else{
            $rspta=$categoria->editar($idCategoria,$nombre);
            echo $rspta ? "Categoria actualizado" : "Categoria No se pudo actualizar";
        }
    break;

	case 'mostrar':
		$rspta = $categoria->mostrar($idCategoria);
		//Codificar el resultado utilizando json
		echo json_encode($rspta);
	break;

	case 'eliminar':
		$rspta=$categoria->eliminar($idCategoria);
 		echo $rspta ? "Categoria eliminada" : "Categoria no se puede eliminar";
	break;

	case 'listar':
		$rspta = $categoria->listar();
		//Vamos a declarar un array
		$data = array();

		while ($reg = $rspta->fetch_object()) {
			$data[] = array(
				"0" => '<button class="btn btn-warning" onclick="mostrar(' .$reg->idCategoria. ')"><i class="fa fa-pen"></i></button>'.
				'<button class="btn btn-danger" onclick="eliminar('.$reg->idCategoria.')"><i class="fas fa-times"></i></button>',
				"1" => $reg->nombre,

			);
		}
		$results = array(
			"sEcho" => 1,
			//Información para el datatables
			"iTotalRecords" => count($data),
			//enviamos el total registros al datatable
			"iTotalDisplayRecords" => count($data),
			//enviamos el total registros a visualizar
			"aaData" => $data
		);
		echo json_encode($results);

		break;
}

?>