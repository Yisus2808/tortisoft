<?php
    //Los nombres de las clases deben empezar con mayúscula
    class M_vistas
    {
        #MÉTODO QUE GESTIONA LOS ENLACES
        static public function M_obtener_vistas($accion)
        {
            if ($accion == "login")
            {
                $contenidos = "vista/contenidos/login-view.php";
            }
            else if($accion == "principal"){
                $contenidos = "vista/contenidos/principal-view.php";
            }
            else if ($accion == "cerrar_sesion")
            {
                $contenidos = "vista/contenidos/cerrar-sesion-view.php";
            }
            else if ($accion == "registrarse")
            {
                $contenidos = "vista/contenidos/registrarse-view.php";
            }
            else if ($accion == "restablecer")
            {
                $contenidos = "vista/contenidos/restablecer-view.php";
            }
            else if ($accion == "verificacion")
            {
                $contenidos = "vista/contenidos/verificacion-view.php";
            }
            else if ($accion == "actualizarPass")
            {
                $contenidos = "vista/contenidos/actualizarPass-view.php";
            }
            else{
                $contenidos = "vista/contenidos/login-view.php";
            }
            return $contenidos;
        }
    }
?>