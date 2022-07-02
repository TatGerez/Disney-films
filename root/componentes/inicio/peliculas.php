<?php

$SesionActiva = false;
$Peliculas = [];

if (isset($_SESSION['user'])) {
    $SesionActiva = true;
    $UserActivo = $_SESSION['user'];
}

if (file_exists("./datos/peliculas.csv")) {

  $archivo = file_get_contents("./datos/peliculas.csv");
  $renglones = explode("\n", $archivo);
  $separador = "|";

  if (count($renglones)>1) {
    
    $campos = explode($separador, $renglones[0]);
    $list = [];

    for($i=1; $i<count($renglones); $i=$i+1) {
      $pelicula_obj=[];
      $renglon = explode($separador, $renglones[$i]);
      foreach($campos as $id_array_campo=>$valor_campo) {
          $pelicula_obj[trim($valor_campo)] = trim($renglon[$id_array_campo]);
      }
      $list[] = (object)$pelicula_obj;
    }
    $Peliculas = $list;

  }

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
              <a href="#" class="btn btn-danger" role="button">Eliminar Pelicula</a>
            </div>
          <?php } ?>
        </div>

        <?php } ?>

      </div>
    </div>
</div>