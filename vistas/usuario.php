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
      <h1 class="box-title">Usuario <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i
            class="fa fa-plus-circle"></i> Agregar</button> </h1>

    </div>
    <!-- /.card-header -->
    <div class="card-body" id="listadoregistros">
      <table id="tbllistado" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Opciones</th>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Rol</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
        <tfoot>
          <tr>
            <th>Opciones</th>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Rol</th>
            <th>Estado</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->

    <!-- Incio formulario -->
    <div class="card-body" id="formularioregistros">

      <form name="formulario" id="formulario" method="POST">
        <!-- #region -->
        <h3 class="mb-0">Registro de Usuario</h3>
        <br>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="example-text-input" class="form-control-label">Nombre de Usuario</label>
              <input type="hidden" name="idUsuario" id="idUsuario">
              <input class="form-control" name="nombreUsuario" id="nombreUsuario" type="text"
                placeholder="introducir nombre de usuario">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="example-text-input" class="form-control-label">Contraseña</label>
              <input class="form-control" name="contrasena" id="contrasena" type="password" maxlength="50"
                placeholder="Introducir contraseña">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="example-text-input" class="form-control-label">Rol</label>
              <input class="form-control" name="idRol" id="idRol" type="text" maxlength="50"
                placeholder="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="example-text-input" class="form-control-label">Identificador Personal</label>
              <select id="idPersonal" name="idPersonal" class="form-control selectpicker" data-live-search="true" required></select>
              <!-- <input class="form-control" name="idPersonal" id="idPersonal" type="text" maxlength="50" placeholder="Introducir su Contraseña">-->
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="example-text-input" class="form-control-label">Estado</label>
              <select type="int" name="estado" id="estado" required class="form-control" class="form-control">
                  <option value="1">ACTIVO</option>
                  <option value="0">DESACTIVADO</option>
                </select>
              <!-- <input class="form-control" name="estado" id="estado" type="text" maxlength="20"
                placeholder="Introducir su direccion"> -->
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
<script type="text/javascript" src="scripts/usuario.js"></script>
<?php
ob_end_flush();
?>
<!-- COPIAR A TODAS LAS VISTAS -->