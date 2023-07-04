<?php
    require_once "modelo/M_vistas.php";
    class C_vistas extends M_vistas {

        public function C_integrar_plantilla() {
            return include "vista/plantilla.php";
        }

        public function C_obtener_vistas() {     

            if(isset($_GET['accion'])) {
                $accion = $_GET['accion'];
            } else {
                $accion = "principal";
            }

            $respuesta = M_vistas::M_obtener_vistas($accion);
            
            include $respuesta;

        }

    }