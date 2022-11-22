var tabla;

//Fucción que se ejecuta al inicio
function init(){
    listar();
    mostrarform(false);

	$("#formulario").on("submit", function (e) {
        
        guardaryeditar(e);
    })
}

//funcion limpiar
function limpiar()
{	$("#idPersonal").val("");
	$("#ci").val("");
	$("#nombre").val("");
	$("#apellido").val("");
	$("#sexo").val("");
    $("#direccion").val("");
	$("#telefono").val("");
	$("#correo").val("");
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

// función para listar  los registros de personal
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
                        url: '../ajax/personal.php?op=listar',
                        type : "get",
                        dataType : "json",						
                        error: function(e){
                            console.log(e.responseText);	
                        }
                    },
            "bDestroy": true,
            "iDisplayLength": 4,//Paginación
            "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
        }).DataTable();
}

//Función para guardar o editar los registros de la tabla personal
function guardaryeditar(e)
{
    e.preventDefault();//no se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled", true);

    var formData = new FormData($("#formulario")[0]);


    	$.ajax({
		url: "../ajax/personal.php?op=guardaryeditar",
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
function mostrar(idPersonal)
{
	$.post("../ajax/personal.php?op=mostrar",{idPersonal : idPersonal}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);
        $("#ci").val(data.ci);
		$("#nombre").val(data.nombre);
        $("#apellido").val(data.apellido);
        $("#sexo").val(data.sexo);
		$("#direccion").val(data.direccion);
        $("#telefono").val(data.telefono);
		$("#correo").val(data.correo);
 		$("#idPersonal").val(data.idPersonal);

 	})
}





init();