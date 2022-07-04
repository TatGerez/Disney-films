<?php

$file_name = "./datos/peliculas.csv";
$separador = "|";
$new_line = "\n";

function obtener_peliculas() {

    $peliculas = [];

    if (file_exists($GLOBALS["file_name"])) {

        $archivo = file_get_contents($GLOBALS["file_name"]);
        $renglones = explode("\n", $archivo);
    
        if (count($renglones)>1) {
        
            $campos = explode($GLOBALS["separador"], $renglones[0]);
            $list = [];
        
            for($i=1; $i<count($renglones); $i=$i+1) {
                $pelicula_obj=[];
                $renglon = explode($GLOBALS["separador"], $renglones[$i]);
                foreach($campos as $id_array_campo=>$valor_campo) {
                    $pelicula_obj[trim($valor_campo)] = trim($renglon[$id_array_campo]);
                }
                $list[] = (object)$pelicula_obj;
            }
            $peliculas = $list;
    
        }
    
    }

    return $peliculas;
    
}

function remover_pelicula($id) {
    //echo "eliminar pelicula: $id \n";

    if (file_exists($GLOBALS["file_name"])) {
        //echo "encuentro el archivo \n";

        $archivo = file_get_contents($GLOBALS["file_name"]);
        $renglones = explode($GLOBALS["new_line"], $archivo);
        $renglones_pelicula_eliminada = "";
    
        if (count($renglones)>1) {

            if (unlink($GLOBALS["file_name"])) {
                // file was successfully deleted

                file_put_contents($GLOBALS["file_name"], $renglones[0], FILE_APPEND);

                for($i=1; $i<count($renglones); $i=$i+1) {

                    $renglon = explode($GLOBALS["separador"], $renglones[$i]);
                    
                    if($renglon[0]<>$id){
                        file_put_contents($GLOBALS["file_name"], $GLOBALS["new_line"].$renglones[$i], FILE_APPEND);
                    }
    
                }
    
            } else {
                // there was a problem deleting the file
            }

            
    
        }

    }
        
        /*if (unlink($GLOBALS["file_name"])) {
            // file was successfully deleted

            file_put_contents($GLOBALS["file_name"], $renglones_pelicula_eliminada);

        } else {
            // there was a problem deleting the file
        }*/
        

}

function remover_pelicul2a($id) {
    echo "eliminar pelicula: $id \n";

    if (file_exists($GLOBALS["file_name"])) {
        //echo "encuentro el archivo \n";

        $archivo = file_get_contents($GLOBALS["file_name"]);
        $renglones = explode("\n", $archivo);
        $renglones_pelicula_eliminada = "";
    
        if (count($renglones)>1) {

            $campos = explode($GLOBALS["separador"], $renglones[0]);

            if (unlink($GLOBALS["file_name"])) {
                // file was successfully deleted

                for($i=0; $i<count($renglones); $i=$i+1) {
                    $renglon = explode($GLOBALS["separador"], $renglones[$i]);
                    if($i==0) {
                        echo "renglones 0: $renglones[0]";
                    } else {
                        if($renglon[0]<>$id){
                            echo "renglon numero $i \n";

                            $x = 0;
                            $len = count($campos);
                            foreach($campos as $id_array_campo=>$valor_campo) {
                                if ($x == $len - 1) {
                                    $renglones_pelicula_eliminada = $renglones_pelicula_eliminada.$renglon[$id_array_campo];
                                } else {
                                    $renglones_pelicula_eliminada = $renglones_pelicula_eliminada.$renglon[$id_array_campo].$GLOBALS["separador"];
                                }
                                $x++;
                            }
                            //echo "renglones $renglones_pelicula_eliminada \n";
                        }
                    // echo "se suma renglon $renglones_pelicula_eliminada";
                        
                    }
                }

                file_put_contents($GLOBALS["file_name"], $renglones_pelicula_eliminada, FILE_APPEND);

                /*file_put_contents(
                    "./datos/principal.csv" // Nombre del archivo
                    ,"$ENTER" . 21 . ",$libro,$autor,$categorias,$lanzamiento,$imagen,$sinopsis,$precio" // Contenido nuevo
                    //,FILE_APPEND // Sin esto se pierde todo lo demás
                ); // Faltaba este punto y coma*/

            } else {
            // there was a problem deleting the file
            }
    
        }
    
    }

    /*$ENTER = "\n" ;
    file_put_contents(
      "./datos/principal.csv" // Nombre del archivo
      ,"$ENTER" . 21 . ",$libro,$autor,$categorias,$lanzamiento,$imagen,$sinopsis,$precio" // Contenido nuevo
      ,FILE_APPEND // Sin esto se pierde todo lo demás
    ); // Faltaba este punto y coma*/

}

?>