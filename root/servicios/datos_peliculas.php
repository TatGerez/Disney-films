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

}

function agregar_pelicula($titulo, $genero, $año, $descripcion, $urlimagen) {

    if (file_exists($GLOBALS["file_name"])) {

        $archivo = file_get_contents($GLOBALS["file_name"]);
        $renglones = explode($GLOBALS["new_line"], $archivo);
        
        if (count($renglones)>1) {

            $ultima_fila = count($renglones)-1;
            $renglon = explode($GLOBALS["separador"], $renglones[$ultima_fila]);
            $siguiente_id = $renglon[0]+1;

            $nueva_pelicula = $siguiente_id.$GLOBALS["separador"]
                                .$titulo.$GLOBALS["separador"]
                                .$descripcion.$GLOBALS["separador"]
                                .$genero.$GLOBALS["separador"]
                                .$año.$GLOBALS["separador"]
                                .$urlimagen;

            file_put_contents($GLOBALS["file_name"], $GLOBALS["new_line"].$nueva_pelicula, FILE_APPEND);

        }

    }

}

?>