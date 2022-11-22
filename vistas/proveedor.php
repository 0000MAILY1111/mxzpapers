<!-- COPIAR A TODAS LAS VISTAS -->
<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION["nombre"])) {
  header("Location: login.php");
} else {
  require 'header.php';
  /* if ($_SESSION['acceso']==1)
   { */
?>
  <!-- COPIAR A TODAS LAS VISTAS -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->

    <div class="card">
      <div class="card-header">
        <h1 class="box-title">Proveedor <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i>
            Agregar</button></h1>

      </div>
      <!-- /.card-header -->
      <div class="card-body" id="listadoregistros">
        <table id="tbllistado" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Opciones</th>
              <th>Nombre</th>          
              <th>Teléfono</th>
              <th>Descripción</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
          <tfoot>
            <tr>
              <th>Opciones</th>
              <th>Nombre</th>           
              <th>Teléfono</th>
              <th>Descripción</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->

      <!-- Incio formulario -->
      <div class="card-body" id="formularioregistros">

        <form name="formulario" id="formulario" method="POST">
          <!-- #region -->
          <h3 class="mb-0">Registro de datos de Proveedor</h3>
          <br>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Nombre de Proveedor</label>
                <input type="hidden" name="idProveedor" id="idProveedor">
                <input class="form-control" name="nombre" id="nombre" type="text" placeholder="ingrese el nombre de proveedor" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Descripción</label>
                <input class="form-control" name="descripcion" id="descripcion" type="text" maxlength="50" placeholder="descripcion de proveedor" >
              </div>
            </div>
          </div>
        
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="example-text-input" class="form-control-label">Teléfono</label>
            <input class="form-control" name="telefono" id="telefono" type="number" maxlength="20" placeholder="Introducir  Telefono de proveedor" required>
          </div>
        </div>

      </div>
      <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
        <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i>
          Cancelar</button>
      </div>
      </form>
    </div>
    <!-- /.Fin Formulario -->

  </div>
  <!-- /.card -->
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- COPIAR A TODAS LAS VISTAS -->
<?php
  require_once 'footer.php';
}
?>
<!-- cambiar en src="scripts/nombredelavista.js" -->
<script type="text/javascript" src="scripts/proveedor.js"></script>
<?php
ob_end_flush();
?>
<!-- COPIAR A TODAS LAS VISTAS -->