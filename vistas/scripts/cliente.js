var tabla;

function init(){
    listar();
    mostrarform(false);

    $("#formulario").on("submit",function(e){
        guardaryeditar(e);
    })
}
function limpiar(){
    $("#idCliente").val("");
    $("#nombre").val("");
    $("#sexo").val("");
    $("#telefono").val("");
}
function mostrarform(flag){
    limpiar();
    if(flag){
        $("#listadoregistros").hide();   //oculatar datatable tabla
		$("#formularioregistros").show();   //mostrar formulario
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
    }
    else{
        $("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
    }
}
function cancelarform(){
    limpiar();
    mostrarform();
}
function listar(){
    tabla=$('#tbllistado').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
        "ajax": {
            url: "../ajax/cliente.php?op=listar", 
            type: "get",
            datatype: "json",
            error: function(e){
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "iDisplayLength": 4,
        "order": [[0,"desc"]]
    }).DataTable();
}
function guardaryeditar(e){
    e.preventDefault();
    $("#btnGuardar").prop("disabled", true);

    var formData = new FormData($("#formulario")[0]);
     
     $.ajax({
        url: "../ajax/cliente.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos){
            mostrarform(false);
            tabla.ajax.reload();
        }
     });
    limpiar();
}


function mostrar(idCliente)
{
	$.post("../ajax/cliente.php?op=mostrar",{idCliente : idCliente}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);
		$("#nombre").val(data.nombre);
        $("#sexo").val(data.sexo);
        $("#telefono").val(data.telefono);
 		$("#idCliente").val(data.idCliente);

 	})
}


init();