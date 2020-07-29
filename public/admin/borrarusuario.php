<?php
session_start();
include("libreria.php");
comprobar("Administrador");

    //Conectamos con la BD
    $link=conectar();

    $query='DELETE FROM usuario WHERE
            identificador = "'.$_GET["identificador"].'"';


    //Ejecutar consulta
   if (mysqli_query($link,$query))
       $_SESSION["error"]="Usuario borrado correctamente";
   else
       $_SESSION["error"]="No se ha podido borrar el Usuario";

    mysqli_close($link);

    header("location:usuarios.php");
 ?>
