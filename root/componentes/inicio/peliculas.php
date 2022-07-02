<?php

$SesionActiva = false;

if (isset($_SESSION['user'])) {
    $SesionActiva = true;
    $UserActivo = $_SESSION['user'];
}

?>
<div class="container-fluid m-0 mb-5 p-0">
    <div class="row justify-content-md-center m-0 p-0">
      <div class="container-fluid col-md-4">

        <?php if ($SesionActiva) { ?>
            sesion activa
        <?php } else { ?>
            sin sesion
        <?php }?>
  
      </div>
    </div>
</div>