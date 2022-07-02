<?php

require_once('./servicios/datos_peliculas.php');

$SesionActiva = false;
$Peliculas = obtener_peliculas();

if (isset($_SESSION['user'])) {
  $SesionActiva = true;
  $UserActivo = $_SESSION['user'];
}

if (isset($_POST['boton_eliminar'])) {
  $id_pelicula = $_POST['id_pelicula'];
  remover_pelicula($id_pelicula);
}

?>
<div class="container-fluid m-0 p-0">
    <div class="row justify-content-md-center m-0 p-0">
    
      <div class="d-flex flex-wrap">

        <?php foreach($Peliculas as $pelicula) { // recorre pelicula por pelicula del array peliculas ?>

        <div class="card m-5" style="width: 18rem;">
          <img src="<?= $pelicula -> imagen_url ?>" class="img-thumbnail" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?= $pelicula -> titulo ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $pelicula -> genero ?></h6>
            <p class="card-text"><?= $pelicula -> descripcion ?></p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Estreno: <?= $pelicula -> año ?></li>
          </ul>
          <?php if ($SesionActiva) { //si hay una sesion activa muestro el boton "cargar pelicula" ?>
            <div class="card-footer">
              <form method="POST">
                <input type="text" class="form-control" name="id_pelicula" hidden="true" value="<?= $pelicula -> id ?>">
                <button type="submit" name="boton_eliminar" class="btn btn-danger">Eliminar Pelicula</button>
              </form>
            </div>
          <?php } ?>
        </div>

        <?php } ?>

      </div>
    </div>
</div>