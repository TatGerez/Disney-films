<?php

$PeliculaAgregada = false;

if (isset($_POST['boton_agregar'])) {
    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $año = $_POST['año'];
    $descripcion = $_POST['descripcion'];
    $urlimagen = $_POST['urlimagen'];
    agregar_pelicula($titulo, $genero, $año, $descripcion, $urlimagen);
    $Peliculas = obtener_peliculas();
    $PeliculaAgregada=true;
}

?>

<?php if ($SesionActiva) { ?>

    <div class="container-fluid p-0 m-0">
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModalAgregarPelicula">Cargar Pelicula</button>
        </div>
    </div>
    
    <?php if ($PeliculaAgregada) { ?>
      <div class="row justify-content-md-center m-0 mt-3 p-0">
        <div class="container-fluid col-md-4">
        
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Listo!</strong> La pelicula fue agregada con exito.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>
      </div>
    <?php } ?>

    <div class="modal fade" id="exampleModalAgregarPelicula" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Pelicula</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="titulo" class="col-form-label">Titulo</label>
                            <input type="text" class="form-control" name="titulo" required>
                        </div>
                        <div class="mb-3">
                            <label for="genero" class="col-form-label">Genero</label>
                            <input type="text" class="form-control" name="genero" required>
                        </div>
                        <div class="mb-3">
                            <label for="año" class="col-form-label">Año</label>
                            <input type="text" class="form-control" name="año" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="col-form-label">Descripción</label>
                            <textarea class="form-control" name="descripcion" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="urlimagen" class="col-form-label">URL de Imagen</label>
                            <textarea class="form-control" name="urlimagen" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" name="boton_agregar" data-bs-dismiss="modal">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php } ?>