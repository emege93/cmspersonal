<?php
session_start();
include("libreria.php");
comprobar("Administrador");

    //Conectamos con la BD
    $link=conectar();

    $query="INSERT INTO usuario
            (identificador,pass,perfil)
            VALUES ('".$_POST["identificador"]."',
                    '".md5($_POST["pass"])."',
                    '".$_POST["perfil"]."')";


    //Ejecutar consulta
   if (mysqli_query($link,$query))
       $_SESSION["error"]="Usuario grabado correctamente";
   else
       $_SESSION["error"]="Error al grabar el Usuario";

    mysqli_close($link);

    header("location:usuarios.php");
 ?>
