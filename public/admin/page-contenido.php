<?php
session_start();
include("libreria.php");
comprobar_base();
?>
<?php include 'header.php'; ?>
<?php  $datos = cargar_contenido($_GET["id"]); ?>

  <div class="row">
    <form action="resultado_contenido.php" enctype="multipart/form-data" method="post" onsubmit="return false;">
      <fieldset>
          <legend>Contenido</legend>

           <input type="hidden" name="id" value="<?= $datos['id']?>" />
           <input type="hidden" name="creador" value="<?= $_SESSION["identificador"]?>" />
           <input type="hidden" name="imganterior" value="<?= $datos['imagen']?>" />

          <label for="type">Tipo</label>
          <select class="form-control" name="type" id="type">
            <option value="">Seleccionar</option>
            <?php $tipo = retornar_tipo_contenido(); ?>
            <?php while(is_array($tipo) && list($k, $v) = each($tipo) ): ?>
              <option value="<?= $k ?>" <?= ($k === $datos['tipo'] )? 'selected' : '' ?> ><?= $v ?></option>
            <?php endwhile; ?>
          </select>

          <label for="category" class="only-post">Categoría</label>
          <div class="select-editable only-post">
              <div class="row">
                <div class="col-5 ml-3">
                  <div class="form-group">
                   <input name="category" list="encodings" style="border: 1px solid #ced4da;" value="<?= $datos['categoria'] ?>" class="custom-select custom-select-sm">
                   <datalist id="encodings">
                     <?php $options_category = cargar_datos_categoria() ?>
                     <?php while(is_array($options_category) && list($k, $v) = each($options_category) ): ?>
                       <option value="<?= $v['categoria'] ?>"><?= $v['categoria'] ?></option>
                     <?php endwhile; ?>
                   </datalist>
                  </div>
                </div>
                <div class="col-3">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
                    Seleccionar Imagen
                  </button>
                </div>
                <div class="col-3">
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#uploadModal">Subir Imagen</button>
                </div>
              </div>
            </div>

          <div class="form-group">
            <label for="title">Titulo</label>
            <input type="text" name="title" class="form-control" placeholder="Titulo" value="<?= $datos['titulo'] ?>">
          </div>

          <div class="form-group">
            <label for="title">Resumen</label>
            <input type="text" name="resumen" class="form-control" placeholder="Resumen" value="<?= $datos['resumen'] ?>">
          </div>

          <!-- Modal -->
          <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <?php
                  $directory="imagenes_";
                  $dirint = dir($directory);
                  while (($archivo = $dirint->read()) !== false)
                  {
                      if (preg_match('/gif/i', $archivo) || preg_match('/jpg/i', $archivo) || preg_match('/png/i', $archivo)){
                          echo '<label class="btn btn-primary">
                                <input type="radio" name="campofotografia" value="'.$archivo.'" autocomplete="off"><img height="140" width="160" src="'.$directory."/".$archivo.'">
                                </label>'."\n";
                      }
                  }
                  $dirint->close();
                  ?>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>

          <!-- CONTENIDO -->
          <div class="adjoined-bottom">
            <div class="grid-container">
                <div class="grid-width-100">
                  <label for="type"></label>
                    <div id="editor">
                      <?= urldecode($datos['contenido']) ?>
                    </div>
                </div>
            </div>
          </div>
          <input type="hidden" name="content" id="content">
          <br />
          <button type="submit" class="btn btn-primary" id="send">Guardar</button>
          <a class="btn btn-primary" onclick="history.back()" role="button">Regresar al menú</a>
      </fieldset>
  </form>

  <!-- Modal Imagen -->
  <div id="uploadModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <div class="row">
            <div class="col-2">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="col-10">
              <h4 class="modal-title">Seleccion de Imagen</h4>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <!-- Form -->
          <form method="POST" action="subidaimagen.php" enctype="multipart/form-data">
            <!-- COMPONENT START -->
            <div class="form-group">
              <div class="input-group input-file" name="fileToUpload" id="fileToUpload">
                  <input type="text" class="form-control" placeholder='Cambiar imagen...' />
                      <span class="input-group-btn">
                      <button class="btn btn-default btn-choose" type="button">Seleccionar</button>
                  </span>
              </div>
            </div>
            <!-- COMPONENT END -->
            <div class="form-group">
              <input type="hidden" name="idp" value="<?= $datos['id']?>" />
              <button type="submit" value="Upload Image" name="submit" class="btn btn-primary pull-right">Enviar</button>
              <button type="reset" class="btn btn-danger">Reiniciar</button>
            </div>
          </form>

          <!-- Preview-->
          <div id='preview'></div>
        </div>

      </div>

    </div>
  </div>
  </div>


<?php include 'footer.php'; ?>
