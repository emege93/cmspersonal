
<?php include 'header.php'; ?>

<?php
if($_SESSION["tipo"] == "Administrador"){
	header("Location:panel.php");
} elseif ($_SESSION["tipo"] == "Autor") {
	header("Location:panelautor.php");
}
 ?>
	<h1>INICIO DE SESION</h1>
	<div class="row align-items-center">
	  <div class="col">
			<form id="form" name ="form" method="post" action="conectar.php">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Usuario</label>
			    <input type="text" class="form-control" id="identificador" name="identificador" aria-describedby="emailHelp" placeholder="Introduce el usuario">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Contraseña</label>
			    <input type="password" class="form-control"  id="pass" name="pass" placeholder="Introduce la cotraseña">
			  </div>
			  <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
				<a class="btn btn-primary" href="../" role="button">Salir</a>
			</form>
	  </div>
	</div>




<?php
if(isset($_SESSION["error"])){
    echo "<div id='error'>".$_SESSION["error"]."</div>";
    unset($_SESSION["error"]);
}

?>

<?php include 'footer.php'; ?>
