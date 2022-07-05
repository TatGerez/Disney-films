<?php

//Inicializo variable ErrorEnLogin
$ErrorEnLogin = false;
$MensajeError = '';

//si boton_iniciar es apretado entra
if (isset($_POST['boton_iniciar'])) {

  //agarra los valores de los input
  $input_user = $_POST['user'];
  $input_pass = $_POST['pass'];

  if ($input_user == '') { //si el usuario es vacio
    $ErrorEnLogin = true;
    $MensajeError = 'Usuario es vacio';
  } else if ($input_pass == '') { //si la contraseña es vacia
    $ErrorEnLogin = true;
    $MensajeError = 'Contraseña es vacia';
  } else { //si usuario NO es vacio y contraseña NO es vacia
    if ($input_user == 'admin' && $input_pass == '123') { //si usuario es "admin" y contraseña es "123" entre
    
      $_SESSION['user'] = $input_user; //guarda el nombre del usuario de la sesion
      header("Location: /index.php"); //recarga index.php
  
    } else { // si usuario no es admin o contraseña no es 123 error de datos erroneos.
      $ErrorEnLogin = true;
      $MensajeError = 'Usuario o contraseña incorrecta.';
    }
  }

}

?>
<div class="container-fluid m-0 mb-5 p-0">
    <div class="row justify-content-md-center m-0 p-0">
      <div class="container-fluid col-md-4">
        
        <?php if ($ErrorEnLogin) { ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> <?= $MensajeError ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php } ?>
      
        <form method="POST" name="form_login">
            <div class="mb-3">
                <label for="user" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="user" name="user">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="pass" name="pass">
            </div>
            <button type="submit" name="boton_iniciar" class="btn btn-primary">Iniciar Sesión</button>
        </form>
  
      </div>
    </div>
</div>