<?php

  if (isset($_POST['login'])) {

    if ($_POST['user'] == 'admin' && $_POST['pass'] == 'admin') {
      
      session_start();
      $_SESSION['valid'] = true;
      $_SESSION['timeout'] = time();
      $_SESSION['user'] = 'admin';

    } else {
      echo 'NO';
    }
  }

/*
    //levanta e inicia los datos de sesión
    session_start() ;

    $form = (object)$_POST;
    $user = $_POST['user'];
    $pass = $_POST['pass'];
  
  $usuariosValidos = [
    "admin" => "admin"
    , "editor" => "1234"
    , "pablito101" => "suma1000"
  ];

  if( 
    isset(
      $usuariosValidos[ $form->nmUsuario ]
    ) // Esto devuelve la contraseña
  ) {
    if( 
      $usuariosValidos[$form->nmUsuario] 
      == 
      $form->nmContra
    ) {
      $_SESSION["usuario"] = $form->nmUsuario ;
      $_SESSION["error"] = "" ; // Quitar cualquier error
    }
    else {
      $_SESSION["error"] = "err=Contraseña no válida" ;
    }
  }
  else {
    $_SESSION["error"] = "err=Usuario no existente" ;
  }

  header( "Location: index.php?" . $_SESSION["error"] ) ;
*/
?>