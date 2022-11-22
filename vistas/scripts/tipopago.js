var tabla;

function init(){
    listar();
    mostrarform(false);

    $("#formulario").on("submit",function(e){
        guardaryeditar(e);
    })
}

function limpiar(){
    $("#idTipoP").val("");
    $("#nombre").val("");
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
            url: "../ajax/tipopago.php?op=listar", 
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
        url: "../ajax/tipopago.php?op=guardaryeditar", //op=guardaryeditar
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
function mostrar(idTipoP){
    $.post("../ajax/tipopago.php?op=mostrar",{idTipoP : idTipoP},function(data,status){ 
        data = JSON.parse(data);
        mostrarform(true);

        $("#idTipoP").val(data.idTipoP);
        $("#nombre").val(data.nombre);  
    });
}

init();