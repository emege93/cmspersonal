<?php
session_start();
include("libreria.php");
comprobar("Administrador");
?>
<?php include 'header.php'; ?>

<?php
    //Conectamos con la BD
    $link=conectar();

    $query='SELECT * FROM usuario
              WHERE identificador = "'.$_GET["identificador"].'"';

    //Ejecutar consulta
    $result=mysqli_query($link,$query);

    //Extraemos datos de la consulta del profesor
    $fila=mysqli_fetch_array($result);

    mysqli_close($link);
    ?>

<form id="form" name="form" method="post"
    	action="modificarusuario.php">
          <h1>Editar Profesor</h1>
      <div class="form-group">

        <input type="hidden" name="idenanterior" id="idenanterior"
          value="<?php echo $fila["identificador"];?>" />
        <input type="hidden" name="passanterior" id="passanterior"
    	  	value="<?php echo $fila["pass"];?>" />

        <label>Usuario
        </label>
        <input class="form-control" type="text" name="identificador" id="identificador"
    		value="<?php echo $fila["identificador"];?>"/>
      </div>
      <div class="form-group">
        <label>Contraseña
        </label>
        <input class="form-control" type="password" name="pass" id="pass" placeholder="Introducir contraseña solo en caso de cambio"/>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect2">Perfil</label>
          <select multiple class="form-control" required id="perfil" name="perfil">
          <option value="<?php echo $fila["perfil"];?>" selected>Seleccione Perfil</option>
  		    <option value="Administrador">Administrador</option>
  		    <option value="Autor">Autor</option>
          </select>
      </div>
      <button class="btn btn-primary" type="submit">Enviar</button>
      <a class="btn btn-primary" href="panel.php">Regresar al menú</a>
      <div class="spacer"></div>
    </form>

<?php include 'footer.php'; ?>
