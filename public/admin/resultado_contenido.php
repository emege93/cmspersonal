<?php
session_start();
include("libreria.php");
comprobar_base();
?>
<?php
$path = dirname(__FILE__);
require_once( $path . '/../../setting/config.php');
require_once( $path . '/../../setting/mysql.php');

if($_POST["campofotografia"] == "") {
  $_POST["campofotografia"] = $_POST["imganterior"];
}

$content = $_POST['content'];
$id = $_POST['id'];
$title = $_POST['title'];
$title2=str_replace( " " , "-" , $title);
$type = $_POST['type'];
$category = ($type == 'PAGE') ? '': $_POST['category'];
$date = date('Y-m-d H:i:s');
$dateurl = date('Y/m/d');
$creador = $_POST['creador'];
$resumen = $_POST['resumen'];
$imagen = $_POST['campofotografia'];


if ($type == "PAGE") {
  $alias = $title2;
} else {
  $alias = "$dateurl/$title2";
}

if($id > 0){
  $sql = <<<SQL
  UPDATE contenidos SET titulo = '$title', tipo = '$type', contenido = '$content',
   categoria = '$category', alias = '$alias', resumen = '$resumen', imagen = '$imagen' WHERE id='$id'
SQL;
}else{
  $sql = <<<SQL
  INSERT INTO contenidos (titulo, tipo, contenido, categoria, alias, creador, resumen, imagen)
  VALUES ('$title', '$type', '$content', '$category', '$alias', '$creador', '$resumen', '$imagen')
SQL;
}


$mysql = new Mysql();
$response = ( $mysql->execute($sql) ) ? 'Contenido guardado exitosamente!' : 'No se realizaron cambios.';

header("Location: " . Config::URL .  "admin/page-respuesta.php?response=$response");

?>
