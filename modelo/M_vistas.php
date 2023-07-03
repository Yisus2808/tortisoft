<?php
    class M_vistas {
        protected function M_obtener_vistas($vistas) {
            $listaBlanca = ["404", "principal"];

            if(in_array($vistas,$listaBlanca)) {
                if(file_exists($contenido = "./vista/contenidos/".$vistas."-view.php")) {
                    $contenido = "./vista/contenidos/".$vistas."-view.php";
                } else {
                    $contenido = "principal";
                }
            } else if($vistas == "principal") {
                $contenido = "principal";
            } else if($vistas == "404") {
                $contenido = "404";
            } else {
                $contenido = "404";
            }
            return $contenido;
        }
    }