<?php
//Función que se conecta a la BD y devuelve el link
function conectar(){
    if(!($link=mysqli_connect("localhost","root","","cms_solvetic"))){
        $_SESSION["error"]="Imposible conectar con servidor MySQL o la base de datos";
        header("Location:index.php");
        exit;
        }
   return $link;
}

//Función de comprobación de usuarios
function comprobar($tipo){
    if (!isset($_SESSION["tipo"]) or ($_SESSION["tipo"]!=$tipo)){
        header("Location:salir.php");
        exit();
    }
}

function comprobar_base(){
    if (!isset($_SESSION["tipo"])){
        header("Location:salir.php");
        exit();
    }
}

function login(){
  if (isset($_SESSION["identificador"])) {
    $loginsalir='"/cms/public/admin/salir.php">Cerrar Sesion';
  } else {
    $loginsalir='"/cms/public/admin/">Login';
  }
}

/**
 * subir_fichero()
 *
 * Sube una imagen al servidor  al directorio especificado teniendo el Atributo 'Name' del campo archivo.
 *
 * @param string $directorio_destino Directorio de destino dónde queremos dejar el archivo
 * @param string $nombre_fichero Atributo 'Name' del campo archivo
 * @return boolean
 */
function subir_fichero($directorio_destino, $nombre_fichero)
{
    $tmp_name = $_FILES[$nombre_fichero]['tmp_name'];
    //si hemos enviado un directorio que existe realmente y hemos subido el archivo
    if (is_dir($directorio_destino) && is_uploaded_file($tmp_name))
    {
        $img_file = $_FILES[$nombre_fichero]['name'];
        $img_type = $_FILES[$nombre_fichero]['type'];
        // Si se trata de una imagen
        if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") ||
 strpos($img_type, "jpg")) || strpos($img_type, "png")))
        {
            //¿Tenemos permisos para subir la imágen?
            if (move_uploaded_file($tmp_name, $directorio_destino . '/' . $img_file))
            {
                return $img_file;
            }
        }
    }
    //Si llegamos hasta aquí es que algo ha fallado
    return false;
}

?>
