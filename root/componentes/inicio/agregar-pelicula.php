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

<?php if ($SesionActiva) { ?>

    <div class="container-fluid p-0 m-0">
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModalAgregarPelicula">Cargar Pelicula</button>
        </div>
    </div>

    <div class="modal fade" id="exampleModalAgregarPelicula" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Pelicula</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="titulo" class="col-form-label">Titulo</label>
                            <input type="text" class="form-control" id="titulo">
                        </div>
                        <div class="mb-3">
                            <label for="genero" class="col-form-label">Genero</label>
                            <input type="text" class="form-control" id="genero">
                        </div>
                        <div class="mb-3">
                            <label for="año" class="col-form-label">Año</label>
                            <input type="text" class="form-control" id="año">
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="col-form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="urlimagen" class="col-form-label">URL de Imagen</label>
                            <textarea class="form-control" id="urlimagen"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php } ?>