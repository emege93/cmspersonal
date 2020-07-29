<?php

function mis_comics(){
		$posts = posts("comic");

	    while(is_array($posts) && list($k, $v) = each($posts) ){
	      $titulo = $v['titulo'];
	      $id = $v['id'];
	      $alias = $v['alias'];
	      $contenido = $v['contenido'];

	      $li .= <<<HTML
	        <li>
	          <a href="$alias">$titulo</a>
	        </li>
HTML;
   		}

    	return "<ul>$li</ul>";
	}

	function mis_peliculas(){
			$posts = posts("pelicula");

		    while(is_array($posts) && list($k, $v) = each($posts) ){
		      $titulo = $v['titulo'];
		      $id = $v['id'];
		      $alias = $v['alias'];
		      $contenido = $v['contenido'];

		      $li .= <<<HTML
		        <li>
		          <a href="$alias">$titulo</a>
		        </li>
HTML;
	   		}

	    	return "<ul>$li</ul>";
		}


	function inicio_posts(){
  		$posts = posts();

  	    while(is_array($posts) && list($k, $v) = each($posts) ){
          $titulo = $v['titulo'];
  	      $id = $v['id'];
  	      $alias = $v['alias'];
  	      $contenido = $v['contenido'];
          $fecha = $v['fecha_publicacion'];
          $creador = $v['creador'];
					$resumen = $v['resumen'];
					$imagen = $v['imagen'];
					$categoria = $v['categoria'];

  	      $li .= <<<HTML
          <div class="card mb-4">
            <img class="card-img-top" src="/cms/public/admin/imagenes_/$imagen" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">$titulo</h2>
              <p class="card-text">$resumen</p>
              <a href="$alias" class="btn btn-primary">Acceder &rarr;</a>
            </div>
            <div class="card-footer text-muted">
             $categoria, $creador, $fecha 
            </div>
          </div>
HTML;
     		}

      	return "<ul>$li</ul>";
  	}
?>
