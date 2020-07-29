<?php require_once('lib/data.php'); ?>
<?php session_start() ?>
<?php

if (isset($_SESSION["identificador"])) {
  $loginsalir='"/cms/public/admin/salir.php">Cerrar Sesion';
} else {
  $loginsalir='"/cms/public/admin/">Login';
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>CONFIGURACION CMS</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="js/fileinput.min.js" type="text/javascript"></script>
  <script src="js/subirfoto.js" type="text/javascript"></script>

  <!-- Course CSS -->
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="container">
  <div class="row mb-4">
    <div class="col-md-12 pb-5">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand text-white">Panel de Configuracion</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item disable">
                <a class="nav-link"><?php echo $_SESSION["identificador"]; ?>
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="/cms/public">Inicio
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href=<?php echo $loginsalir;?></a>
              </li>
            </ul>
          </div>
        </div>
        </nav>
      </div>
  </div>
