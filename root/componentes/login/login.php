<?php

//Inicializo variable ErrorEnLogin
$ErrorEnLogin = false;
$MensajeError = '';

if (isset($_POST['boton_iniciar'])) {

  $input_user = $_POST['user'];
  $input_pass = $_POST['pass'];

  if ($input_user == '') {
    $ErrorEnLogin = true;
    $MensajeError = 'Usuario es vacio';
  } else if ($input_pass == '') {
    $ErrorEnLogin = true;
    $MensajeError = 'Contraseña es vacia';
  } else {
    if ($input_user == 'admin' && $input_pass == '123') {
    
      $_SESSION['user'] = $input_user;
      header("Location: /index.php");
  
    } else {
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