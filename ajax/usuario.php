<?php 
session_start();
require_once "../modelos/Usuario.php";

$usuario = new Usuario();     

$idUsuario = isset($_POST["idUsuario"])?limpiarCadena($_POST["idUsuario"]):"";
$nombreUsuario = isset($_POST["nombreUsuario"])?limpiarCadena($_POST["nombreUsuario"]):"";//PHP isset(), dicha función comprueba si una variable está definida o no en el script de PHP que se está ejecutando
$contrasena = isset($_POST["contrasena"])?limpiarCadena($_POST["contrasena"]):"";
$idRol = isset($_POST["idRol"])?limpiarCadena($_POST["idRol"]):"";
$idPersonal = isset($_POST["idPersonal"])?limpiarCadena($_POST["idPersonal"]):"";
$estado = 1;/* isset($_POST["estado"])?limpiarCadena($_POST["estado"]):""; */

/*
$idUsuario='2';

$nombreUsuario ='personal_2'; 
$contrasena = '12345';
$idRol = '2';
$idPersonal ='3'; 
$estado = '1';*/


switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idUsuario)){
		
			$rspta=$usuario->insertar($nombreUsuario,$contrasena,$idRol,$idPersonal,$estado);
			echo $rspta ? "Usuario registrado" : "Usuario no se pudo registrar";
			
		}
		else {
		
			$rspta=$usuario->editar($idUsuario,$nombreUsuario,$contrasena,$idRol,$idPersonal,$estado);
			echo $rspta ? "Usuario actualizado" : "Usuario no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$usuario->desactivar($idUsuario);
 		echo $rspta ? "Usuario Desactivada" : "Usuario no se puede desactivar";
	break;

	case 'activar':
		$rspta=$usuario->activar($idUsuario);
 		echo $rspta ? "Usuario activada" : "Usuario no se puede activar";
	break;

	case 'mostrar':
		$rspta=$usuario->mostrar($idUsuario);
		//Codificar el resultado utilizando json
		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$usuario->listar();
 		//Vamos a declarar un array
		$data= Array();

        while ($reg=$rspta->fetch_object()){
            $data[]=array(
				"0"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idUsuario.')"><i class="fa fa-pen"></i></button>'.
				'<button class="btn btn-danger"  onclick="desactivar('.$reg->idUsuario.')"><i class="fa fa-times"></i></button>':
				'<button class="btn btn-warning" onclick="mostrar('.$reg->idUsuario.')"><i class="fa fa-pen"></i></button>'.
				'<button class="btn btn-primary" onclick="activar('.$reg->idUsuario.')"><i class="fa fa-check"></i></button>',
				"1"=>$reg->nombrepersonal,
				"2"=>$reg->nombreUsuario,
				"3"=>$reg->contrasena,
				"4"=>$reg->idRol,
                "5"=>($reg->estado)?'<span class="label bg-green">Activado</span>':
				'<span class="label bg-red">Desactivado</span>',
            );
        }
        $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);

	break;

	case 'selectPersonal':
		require_once "../modelos/Personal.php";
		$personal = new Personal();
		$rspta = $personal-> listarNoUsuario();
		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idPersonal . '>' . $reg->nombre . '</option>';
				}
	break;

	case 'verificar':
		$user=$_POST['usuario'];
	    $password=md5($_POST['password']);   
		$rspta=$usuario->verificar($user, $password);
		$fetch=$rspta->fetch_object();
		if (isset($fetch))
	    {
	        //Declaramos las variables de sesión
	        $_SESSION['idusuario']=$fetch->idUsuario;
	        $_SESSION['nombre']=$fetch->nombreUsuario;
	        $_SESSION['idpersonal']=$fetch->idPersonal;
	        $_SESSION['estado']=$fetch->estado;
			
	    }
	    echo json_encode($fetch);
	break;

	case 'salir':
		//Limpiamos las variables de sesión   
        session_unset();
        //Destruìmos la sesión
        session_destroy();
        //Redireccionamos al login
        header("Location: ../index.php");
	break;
}
?>