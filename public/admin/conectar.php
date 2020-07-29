<?php
session_start();
include("libreria.php");

//Llamar a la función de copnexión con la BD
$link=conectar();

// Traer datos de usuario y clave del formulario
$pass=$_POST["pass"];
$identificador=$_POST["identificador"];

//Creamos la consulta SQL
$query="SELECT * FROM usuario WHERE identificador='".$identificador.
            "' AND pass='".md5($pass)."'";
$result=mysqli_query($link,$query);

/* Si se puede extraer una fila es que el usuario
 *  existe y la password es correcta
 */

if ($fila=mysqli_fetch_array($result)){
    $_SESSION["tipo"]=$fila["perfil"];
    $_SESSION["identificador"]=$identificador;
    switch ($fila["perfil"]){
        case Administrador:     //Es administrador
               header("Location:panel.php");
               break;
        case Autor:     // Es Autor
            header("Location:panelautor.php");
            break;
    }
}
else{
    $_SESSION["error"]="Usuario o contraseña erróneos";
    header("Location:index.php");
}

//Cierre de la conexión a la BD
mysqli_close($link);
?>
