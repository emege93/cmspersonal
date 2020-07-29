<?php
session_start();
include("libreria.php");
comprobar_base();

    //Conectamos con la BD
    $link=conectar();

    $query='DELETE FROM contenidos WHERE
            id = '.$_GET["id"].'';


    //Ejecutar consulta
   if (mysqli_query($link,$query))
       $_SESSION["error"]="Contenido borrado correctamente";
   else
       $_SESSION["error"]="No se ha podido borrar el contenido";

    mysqli_close($link);

    header("location:page-consultar.php");
 ?>
