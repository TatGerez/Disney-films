<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disney Films</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<?php

session_start();

$SesionActiva = false;
$VerSinIniciar = false;
$UserActivo = null;

if (isset($_SESSION['user'])) {
    $SesionActiva = true;
    $UserActivo = $_SESSION['user'];
}

if (isset($_GET['verSinIniciar'])) {
    $VerSinIniciar = true;
}

?>

<body>
    
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Disney Films</a>
                <div class="d-flex">
                    <div class="container-fluid">
                        <?php if ($SesionActiva) { ?>
                            <span class="navbar-text text-center">
                                <?=$UserActivo?>
                            </span>
                            <a href="/servicios/cerrar_sesion.php" class="btn btn-outline-danger" role="button">Cerrar Sesión</a>
                        <?php } else if ($VerSinIniciar) { ?>
                            <a href="index.php" class="btn btn-success" role="button">Iniciar Sesión</a>
                        <?php } else { ?>
                            <a href="index.php?verSinIniciar=true" class="btn btn-info" role="button">Ver sin iniciar</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="container-fluid p-0 pt-5 mt-5">

        <div class="container-fluid p-0 m-0">
            <?php if ($SesionActiva) { ?>
                <div class="d-flex justify-content-center">
                    <a href="index.php?verSinIniciar=true" class="btn btn-warning" role="button">Cargar Pelicula</a>
                </div>
            <?php } ?>
        </div>

        <div class="container-fluid p-0 mt-5">
            <?php 
                if ($SesionActiva || $VerSinIniciar) {
                    include "./componentes/inicio/peliculas.php";
                } else {
                    include "./componentes/login/login.php";
                }
            ?>
        </div>
        
        <footer class="footer mt-auto py-3 bg-light">
            <div class="container text-center">
                <span class="text-muted">Tatiana Agostina Gerez.</span>
            </div>
        </footer>
    </div>

</body>
</html>