var tabla;

//Fucción que se ejecuta al inicio
function init(){
    mostrarform(false);
	listar();

	$("#formulario").on("submit", function (e) {
        
        guardaryeditar(e);
    })

	//Cargamos los items al select personal
	$.post("../ajax/usuario.php?op=selectPersonal", function(r){
		$("#idPersonal").html(r);
		$('#idPersonal').selectpicker('refresh');
	});
}

//funcion limpiar
function limpiar()
{	$("#idUsuario").val("");
	$("#nombreUsuario").val("");
	$("#contrasena").val("");
	$("#idRol").val("");
	//$("#idPersonal").val("");
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();   //oculatar datatable tabla
		$("#formularioregistros").show();   //mostrar formulario
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

// función para listar  los registros de USUARIO
function listar()
{
    tabla=$('#tbllistado').dataTable(
        {
            "aProcessing": true,//Activamos el procesamiento del datatables
            "aServerSide": true,//Paginación y filtrado realizados por el servidor
            dom: 'Bfrtip',//Definimos los elementos del control de tabla
            buttons: [		          
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdf'
                    ],
            "ajax":
                    {
                        url: '../ajax/usuario.php?op=listar',
                        type : "get",
                        dataType : "json",						
                        error: function(e){
                            console.log(e.responseText);	
                        }
                    },
            "bDestroy": true,
            "iDisplayLength": 5,//Paginación
            "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
        }).DataTable();
}

//Función para guardar o editar los registros de la tabla usuario
function guardaryeditar(e)
{
    e.preventDefault();//no se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled", true);

    var formData = new FormData($("#formulario")[0]);
    	$.ajax({
		url: "../ajax/usuario.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,
	    success: function(datos)
	    {                    
			//bootbox.alert(datos);	
			alert(datos);          
	        mostrarform(false);
	        tabla.ajax.reload();

	    }

        });
    
    limpiar();
}


//Implementamos  la funcion mostrar
function mostrar(idUsuario)
{
	$.post("../ajax/usuario.php?op=mostrar",{idUsuario : idUsuario}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);
		$("#idUsuario").val(data.idUsuario);
        $("#nombreUsuario").val(data.nombreUsuario);
		$("#contrasena").val(data.contrasena);
		$("#idRol").val(data.idRol);
		$("#idPersonal").val(data.idPersonal);
		$('#idPersonal').selectpicker('refresh');
 	})
}
/////funcion activar registros 
function activar(idUsuario)
{	
	bootbox.confirm ("¿Esta Seguro de desactivar el usuario?", function(result){
		if (result)
		{
			$.post ("../ajax/usuario.php?op=activar", {idUsuario:idUsuario},function (result) {
			bootbox.alert (e);
			tabla.ajax.reload();
		});
		}
	})
}

///funcion desactivar registros 
function desactivar(idUsuario)
{	
	bootbox.confirm ("¿Esta Seguro de desactivar el usuario?", function(result){
		if (result)
		{
			$.post ("../ajax/usuario.php?op=desactivar", {idUsuario:idUsuario},function (result){

			bootbox.alert (e);
			tabla.ajax.reload();
		});

		}

	})
	

}






init();