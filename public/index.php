<?php include_once(dirname(__FILE__) . '/../setting/core.php' );
session_start();
$categorias=categorias();
$paginas=paginas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title><?= site_info('titulo') .' - '. page_info('titulo') ?></title>
  <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">

</head>

<body style="background-image: url('/cms/setting/imagenes/fondorojo.jpg');background-repeat: no-repeat;
    background-position: top center;
    background-attachment: fixed;">

  <div class="container">

  <div class="row">
  <div class="col-md-12 pb-5">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand text-white" >Pagina de JavierMartin</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" aria-controls="navbarResponsive"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/cms/public/">Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Paginas
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <?php foreach ($paginas as $p => $p2) {
                      foreach ($p2 as $p3 => $pagina) {
                        $alias=paginas_alias($pagina);
                        echo "<a class='dropdown-item' href='/cms/public/$alias'>$pagina</a>";
                      }}?>
            </div>
          </li>
          <li class="nav-item">
            <?php if(isset($_SESSION["identificador"])){
              echo '<a class="nav-link" href="/cms/public/admin/">Panel</a>';
            } else {
              echo '<input class="btn btn-primary mt-1 btn-sm" data-toggle="modal" data-target="#entrar" type="button" value="Login">';
            }?>
          </li>
        </ul>
      </div>
    </div>
    </nav>
  </div>
  </div>

    <div class="row d-flex justify-content-center">

        <!-- Columna del blog -->
        <div class="col-md-8 pt-5">
          <div class="col ml-4">
            <h1><?= site_info('titulo') ?></h1>
          </div>
          <?= page_info('contenido') ?>
          <small><?= site_info('titulo') ?> todos los derechos reservados. Dirección: <?= site_info('direccion') ?></small>
        </div>

      </div>
      <!-- /.row -->
    </div>

  <!-- MODAL LOGIN -->
    <section class="modal" id="entrar">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <div class="modal-title">
                        Entra en sesión
                    </div>
                    <span data-dismiss="modal">X</span>
                </div>
                <form id="form" name ="form" method="post" action="admin/conectar.php">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Usuario:</label>
                            <input type="text" class="form-control" id="identificador" name="identificador" placeholder="Usuario">
                        </div>
                        <div class="form-group">
                            <label>Contraseña:</label>
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Introduce tu contraseña">
                        </div>
                    </div>
                    <div class="modal-footer text-right">
                        <input type="submit" class="btn btn-primary" value="Entrar">
                    </div>
                </form>
            </div>
        </div>
    </section>

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
