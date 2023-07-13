<?php
    require_once "modelo/M_vistas.php";
    class C_vistas {

        static public function C_integrar_plantilla() {
            include "vista/plantilla.php";
        }

        static public function C_obtener_vistas() {     

            if(isset($_GET['accion'])) {
                $accion = $_GET['accion'];
            } else {
                $accion = "login";
            }

            $respuesta = M_vistas::M_obtener_vistas($accion);
            
            include $respuesta;

        }

    }