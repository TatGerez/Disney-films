<?php
   session_start(); //levantar las sesiones que haya en php para poder utilizar las sesiones
   unset($_SESSION["user"]); //eliminar el valor de sesion user
   session_destroy(); //destrozar la sesion (terminar de eliminarla)
   
   header("Location: /index.php"); //redireccion y refresca el index.php
?>