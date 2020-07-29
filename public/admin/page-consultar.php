<?php
session_start();
include("libreria.php");
comprobar_base();
?>
<?php include('header.php'); ?>

<?php

if ($_SESSION["tipo"] == "Administrador") {
  $res = cargar_datos_contenidos(); $array_type = retornar_tipo_contenido();
} elseif ($_SESSION["tipo"] == "Autor") {
  $res = cargar_datos_contenidos_creador($_SESSION["identificador"]); $array_type = retornar_tipo_contenido();
}
?>

   <div class="row">
     <div class="col-md-12">
       <div class="table-responsive">
         <table class="table table-hover table-bordered mydatable">
           <thead class="thead-dark">
               <tr>
                   <th></th>
                   <th>Titulo</th>
                   <th>Fecha</th>
                   <th>Tipo</th>
                   <th>Categoría</th>
                   <th>Autor</th>
                   <th>Acción</th>
                   <th></th>
               </tr>
           </thead>

           <tbody>
               <?php while(is_array($res) && list($k, $v) = each($res) ): ?>
               <tr>
                 <td><?= $k+1 ?></td>
                 <td><?= $v['titulo'] ?></td>
                 <td><?= $v['fecha_publicacion'] ?></td>
                 <td><?= $array_type [ $v['tipo'] ] ?></td>
                 <td><?= $v['categoria'] ?></td>
                 <td><?= $v['creador'] ?></td>
                 <td><a class="btn btn-primary" role="button" href="page-contenido.php?id=<?=$v['id']?>">Editar</a></td>
                 <td><a class="btn btn-primary" role="button" href="borrarcontenido.php?id=<?=$v['id']?>">Borrar</a></td>
               </tr>
               <?php endwhile; ?>
           </tbody>
         </table>
       </div>
     </div>
   </div>
  <a class="btn btn-primary" href="page-contenido.php" role="button">Nuevo</a>
  <a class="btn btn-primary" onclick="history.back()" role="button">Regresar al menú</a>

<?php include('footer.php'); ?>
