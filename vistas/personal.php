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
        <h1 class="box-title">Personal <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i>
            Agregar</button></h1>

      </div>
      <!-- /.card-header -->
      <div class="card-body" id="listadoregistros">
        <table id="tbllistado" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Opciones</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Carnet de Identidad</th>
              <th>Sexo</th>
              <th>Dirección</th>
              <th>Teléfono</th>
              <th>Correo</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
          <tfoot>
            <tr>
              <th>Opciones</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Carnet de Identidad</th>
              <th>Sexo</th>
              <th>Dirección</th>
              <th>Teléfono</th>
              <th>Correo</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->

      <!-- Incio formulario -->
      <div class="card-body" id="formularioregistros">

        <form name="formulario" id="formulario" method="POST">
          <!-- #region -->
          <h3 class="mb-0">Registro de personal</h3>
          <br>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Carnet de Identidad</label>
                <input type="hidden" name="idPersonal" id="idPersonal">
                <input class="form-control" name="ci" id="ci" type="number" placeholder="ingrese el numero de Carnet" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Nombre</label>
                <input class="form-control" name="nombre" id="nombre" type="text" maxlength="50" placeholder="Nombre" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Apellido</label>
                <input class="form-control" name="apellido" id="apellido" type="text" maxlength="50" placeholder="apellido de personal" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Sexo</label>
                <select type="char" name="sexo" id="sexo" required class="form-control" class="form-control">
                  <option value="M">MASCULINO</option>
                  <option value="F">FEMENINO</option>
                </select>
              </div>
          </div>



          <div class="col-md-6">
            <div class="form-group">
              <label for="example-text-input" class="form-control-label">Dirección</label>
              <input class="form-control" name="direccion" id="direccion" type="text" maxlength="50" placeholder="Ingroducir la direccion del personal">
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="example-text-input" class="form-control-label">Teléfono</label>
            <input class="form-control" name="telefono" id="telefono" type="text" maxlength="20" placeholder="Introducir  Telefono" required>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="example-text-input" class="form-control-label">Correo</label>
            <input class="form-control" name="correo" id="correo" type="email" maxlength="50" placeholder="Ej. jesse@example.com">
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
<script type="text/javascript" src="scripts/personal.js"></script>
<?php
ob_end_flush();
?>
<!-- COPIAR A TODAS LAS VISTAS -->