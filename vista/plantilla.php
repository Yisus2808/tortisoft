<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TortiSoft</title>
    <?php require_once "modulos/css.php"; ?>
</head>
<body>
    
    <?php 
        require_once "./controlador/C_vistas.php";
        $vista = new C_vistas();
        $vistasR = $vista->C_obtener_vistas();
    ?>

    <?php require_once "modulos/js.php" ?>
</body>
</html>