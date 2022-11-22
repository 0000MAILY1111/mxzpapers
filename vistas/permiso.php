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
                <h1 class="box-title">Permisos</h1>
             
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="listadoregistros">
                <table id="tbllistado" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Identificador</th>
                      <th>Nombre</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Identificador</th>
                        <th>Nombre</th>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->

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
<script type="text/javascript" src="scripts/permiso.js"></script>
<?php 
ob_end_flush();
?>
<!-- COPIAR A TODAS LAS VISTAS --> 