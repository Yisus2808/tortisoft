<?php
    class M_vistas {
        protected function M_obtener_vistas($accion) {
            $listaBlanca = ["404", "principal","login"];

            if(in_array($accion,$listaBlanca)) {
                if(file_exists($contenido = "./vista/contenidos/".$accion."-view.php")) {
                    $contenido = "./vista/contenidos/".$accion."-view.php";
                } else {
                    $contenido = "principal";
                }
            } else if($accion == "principal") {
                $contenido = "principal";
            } else if($accion == "404") {
                $contenido = "404";
            } else {
                $contenido = "404";
            }
            return $contenido;
        }
    }