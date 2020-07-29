<?php
session_start();
include("libreria.php");
comprobar("Administrador");

    //Conectamos con la BD
    $link=conectar();

    if($_POST["pass"] == "") {
        $_POST["pass"] = $_POST["passanterior"];
    }
    
    if ($_POST["pass"] == $_POST["passanterior"]) {
        $query="UPDATE usuario
            SET identificador='".$_POST["identificador"]."',
                pass='".$_POST["pass"]."',
                perfil='".$_POST["perfil"]."'
            WHERE identificador='".$_POST["idenanterior"]."'";
    } else {
        $query="UPDATE usuario
            SET identificador='".$_POST["identificador"]."',
                pass='".md5($_POST["pass"])."',
                perfil='".$_POST["perfil"]."'
            WHERE identificador='".$_POST["idenanterior"]."'";
    }


    //Ejecutar consulta
   if (mysqli_query($link,$query))
       $_SESSION["error"]="Usuario modificado correctamente";
   else
       $_SESSION["error"]="$query";

    mysqli_close($link);

    header("location:usuarios.php");
 ?>
