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
{	$("#idProveedor").val("");
	$("#nombre").val("");
	$("#descripcion").val("");
	$("#telefono").val("");
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

// función para listar  los registros de proveedor
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
                        url: '../ajax/proveedor.php?op=listar',
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

//Función para guardar o editar los registros de la tabla proveedor
function guardaryeditar(e)
{
    e.preventDefault();//no se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled", true);

    var formData = new FormData($("#formulario")[0]);

     console.log(formData);
    	$.ajax({
		url: "../ajax/proveedor.php?op=guardaryeditar",
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
function mostrar(idProveedor)
{
	$.post("../ajax/proveedor.php?op=mostrar",{idProveedor : idProveedor}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);
		$("#idProveedor").val(data.idProveedor);	  
		$("#nombre").val(data.nombre);
        $("#telefono").val(data.telefono);
		$("#descripcion").val(data.descripcion);

 	})
}

//Implementamos  la funcion eliminar
function eliminar(idProveedor)
{
	bootbox.confirm ("¿Esta Seguro?", function(result){
		if (result)
		{
			$.post ("../ajax/proveedor.php?op=eliminar", {idProveedor:idProveedor},function (result){
			bootbox.alert (e);
			tabla.ajax.reload();
		});
		}
	})
}
init();