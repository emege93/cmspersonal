<?php

    session_start();
    
    unset($_SESSION["error"]);
    unset($_SESSION["tipo"]);
    
    session_destroy();
    header("Location:index.php");

?>