<?php
session_start();
include("libreria.php");
comprobar("Administrador");
?>
<?php include 'header.php'; ?>

<?php
    //Conectamos con la BD
    $link=conectar();
    $query="SELECT * FROM usuario";
    //Ejecutar consulta
    $result=mysqli_query($link,$query);
    //Mostar resultados en tabla
    //Primero la fila de títulos
    ?>
    <h2>Gestion de Usuarios</h2>
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            	<tr>
            		<th></th>
            		<th>Identificador</th>
            		<th>Contraseña</th>
            		<th>Perfil</th>
            		<th></th>
            	</tr>
            </thead>

 <?php
 while ($fila=mysqli_fetch_array($result)){
     echo "<tr>
            <td><a href='editarusuario.php?identificador=".$fila["identificador"]."'
                class='pure-button pure-button-primary'>Editar</a></td>
            <td>".$fila['identificador']."</td>
            <td>********</td>
            <td>".$fila['perfil']."</td>
            <td><a href='borrarusuario.php?identificador=".$fila["identificador"]."'>Borrar</a></td>
           </tr>";
 }

 mysqli_close($link);
?>
          </table>
        </div>
      </div>
    </div>

<div class="row">
  <div class="col">
    <form id="form1" name="form1" method="post"
   		action="insertarusuario.php">
   		<button type="submit" class="btn btn-primary" name="send" id="send">Insertar usuario</button>
      <a class="btn btn-primary" href="../admin/panel.php" role="button">Regresar al menú</a>
   	</form>
  </div>




<?php
if(isset($_SESSION["error"])){
    echo "<div id='mensaje'>".$_SESSION["error"]."</div>";
    unset($_SESSION["error"]);
}

?>
<?php include 'footer.php'; ?>
