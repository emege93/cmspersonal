<?php
session_start();
include("libreria.php");
comprobar_base();
?>
<?php include 'header.php' ?>
   <table class="pure-table">
     <tr>
       <td>
         <h4><?= $_GET['response'] ?></h4>
       </td>
     </tr>
     <tr>
       <td>
         <?php
         if($_SESSION["tipo"] == "Administrador"){
         echo	'<a href="panel.php">Regresar al menú</a>';
         } elseif ($_SESSION["tipo"] == "Autor") {
         echo	'<a href="panelautor.php">Regresar al menú</a>';
         }
          ?>
       </td>
     </tr>
   </table>
<?php include 'footer.php' ?>
