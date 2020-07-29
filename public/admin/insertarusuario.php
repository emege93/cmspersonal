<?php
session_start();
include("libreria.php");
comprobar("Administrador");
?>
<?php include 'header.php'; ?>


    <form id="form" name="form" method="post"
    	action="grabarusuario.php">
          <h1>Datos Personales</h1>
      <div class="form-group">
        <label>Usuario
        </label>
        <input class="form-control" type="text" name="identificador" id="identificador"/>
      </div>
      <div class="form-group">
        <label>Contraseña
        </label>
        <input class="form-control" type="password" name="pass" id="pass"/>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect2">Perfil</label>
          <select multiple class="form-control" name="perfil">
            <option value="Administrador">Administrador</option>
            <option value="Autor">Autor</option>
          </select>
      </div>
      <button class="btn btn-primary" type="submit">Enviar</button>
      <a class="btn btn-primary" href="panel.php">Regresar al menú</a>
      <div class="spacer"></div>
    </form>

	<?php include 'footer.php';?>
