<?php
// comenzamos nuestra app con la inicializacion de variables de sesión
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TortiSoft</title>
    <?php require_once "./vista/modulos/css.php"; ?>
    <?php require_once "./vista/modulos/js.php"; ?>
</head>
<body>
    
    <?php 
        require_once "./controlador/C_vistas.php";
        $vista = new C_vistas();
        $vistasR = $vista->C_obtener_vistas();
    ?>
</body>
</html>