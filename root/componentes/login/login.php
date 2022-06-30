<?php

$ErrorEnLogin = false;

if (isset($_POST['login'])) {

  if ($_POST['user'] == 'admin' && $_POST['pass'] == 'admin') {
    
    $_SESSION['user'] = 'admin';
    header("Location: /index.php");

  } else {
    $ErrorEnLogin = true;
  }
}

?>
<div class="container-fluid m-0 mb-5 p-0">
    <div class="row justify-content-md-center m-0 p-0">
      <div class="container-fluid col-md-4">

        <?php if ($ErrorEnLogin) { ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> usuario o contraseña incorrecta.
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
              <button type="submit" name="login" class="btn btn-primary">Iniciar Sesión</button>
          </form>
  
      </div>
    </div>
</div>