<?php
require_once "../modelos/Tipopago.php";

$tipopago = new Tipopago();

$idTipoP = isset($_POST["idTipoP"])?limpiarCadena($_POST["idTipoP"]):"";
$nombre = isset($_POST["nombre"])?limpiarCadena($_POST["nombre"]):"";

switch($_GET["op"]){
    case 'guardaryeditar':
        if(empty($Id)){
            $rspta = $tipopago->insertar($nombre);
            echo $rspta ? "Tipo de pago registrado" : "No se pudo registrar";
        }
        else{
            $rspta=$tipopago->editar($idTipoP,$nombre);
            echo $rspta ? "Tipo de pago actualizado" : "No se pudo actualizar";
        }
    break;
    case 'mostrar':
        $rspta=$tipopago->mostrar($idTipoP);
        echo json_encode($rspta);
    break;
    case 'listar':
        $rspta=$tipopago->listar();
        $data = Array();

        while($reg = $rspta->fetch_object()){
            $data[]=array(
                "0"=>$reg->idTipoP,
                "1"=>$reg->nombre,
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