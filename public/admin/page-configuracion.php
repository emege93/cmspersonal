<?php
session_start();
include("libreria.php");
comprobar("Administrador");
?>
<?php include 'header.php'; ?>
  <?php $res = cargar_datos_configuracion(); ?>

  <div class="row">
    <form action="resultado_configuracion.php" method="post">
       <fieldset>
           <legend>Configuración</legend>

           <label for="title">Titulo web</label>
           <input class="form-control" name="title" type="text" placeholder="Titulo" value="<?= $res['titulo'] ?>">

           <label for="address">Dirección</label>
           <input class="form-control" name="address" type="text" placeholder="Dirección" value="<?= $res['direccion'] ?>">


           <label for="geolocation">Geolocalización</label>
           <input class="form-control" name="geolocation" type="text" placeholder="latitud,longitud" value="<?= $res['geolocalizacion'] ?>">
           <p></p>
           <button type="submit" class="btn btn-primary">Guardar</button>
           <button type="button" class="btn btn-primary" onclick="history.back()">Volver</button>
       </fieldset>
   </form>
  </div>

<?php include 'footer.php'; ?>
