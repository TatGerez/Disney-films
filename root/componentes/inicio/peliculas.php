<?php

require_once('./servicios/datos_peliculas.php');

$SesionActiva = false;
$PeliculaEliminada = false;
$Peliculas = obtener_peliculas();

if (isset($_SESSION['user'])) {
  $SesionActiva = true;
  $UserActivo = $_SESSION['user'];
}

if (isset($_POST['boton_eliminar'])) {
  $id_pelicula = $_POST['id_pelicula'];
  remover_pelicula($id_pelicula);
  $Peliculas = obtener_peliculas();
  $PeliculaEliminada=true;
}

?>
<div class="container-fluid m-0 p-0">
        
    <?php if ($SesionActiva) { //si hay una sesion activa muestro el boton "cargar pelicula" ?>
        <div class="container-fluid p-0 m-0">
            <div class="d-flex justify-content-center">
                <a href="#" class="btn btn-warning" role="button">Cargar Pelicula</a>
            </div>
        </div>
    <?php } ?>
        
    <?php if ($PeliculaEliminada) { ?>
      <div class="row justify-content-md-center m-0 mt-3 p-0">
        <div class="container-fluid col-md-4">
        
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Listo!</strong> La pelicula fue eliminada.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>
      </div>
    <?php } ?>
    
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
              
                <!-- Button trigger modal -->
                <button type="button" name="boton_eliminar" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?=$pelicula->id?>">Eliminar Pelicula</button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop<?=$pelicula->id?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Estas por eliminar una pelicula</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        ¿Estas seguro que deseas eliminar la pelicula <strong> <?= $pelicula -> titulo ?> </strong> ?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="boton_eliminar">Confirmar</button>
                      </div>
                    </div>
                  </div>
                </div>

                <input type="text" class="form-control" name="id_pelicula" hidden="true" value="<?= $pelicula -> id ?>">

              </form>

            </div>
          <?php } ?>
        </div>

        <?php } ?>

      </div>
    </div>
</div>