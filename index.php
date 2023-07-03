<?php

require_once './core/configGeneral.php';
require_once './controlador/C_vistas.php';

$pagina = new C_vistas();
$pagina -> C_integrar_plantilla();