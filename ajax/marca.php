<?php 
    require_once "../modelos/Marca.php";

    $marca = new Marca();

    $idMarca = isset($_POST['idMarca'])?limpiarCadena($_POST['idMarca']):"";
    $nombre = isset($_POST['nombre'])?limpiarCadena($_POST['nombre']):"";
    

    switch ($_GET["op"]){
        case 'guardaryeditar':
            if(empty($idMarca)){
                $rspta = $marca->insertar($nombre);
                echo $rspta?"Marca registrada":"Marca no registrado";
            } else {
                $rspta = $marca->editar($idMarca,$nombre);
                echo $rspta?"Marca actualizado !":"Marca no actualizado";
            }
        break;
        
        case 'mostrar':
            $rspta = $marca->mostrar($idMarca);
            echo json_encode($rspta);
        break;

        case 'listar':
            $rspta=$marca->listar();
             //Vamos a declarar un array
            $data= Array();
    
             while ($reg=$rspta->fetch_object()){
                 $data[]=array(
                    "0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idMarca.')"><i class="fa fa-pen"></i></button>',                    
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