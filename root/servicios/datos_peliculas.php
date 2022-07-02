<?php

function obtener_peliculas() {

    $file_name = "./datos/peliculas.csv";
    $peliculas = [];

    if (file_exists($file_name)) {

        $archivo = file_get_contents($file_name);
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
            $peliculas = $list;
    
        }
    
    }

    return $peliculas;
    
}

function remover_pelicula($id) {
    echo "id a remover: $id";
}

?>