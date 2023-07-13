<form method="POST" autocomplete="off">
    <?php
    require_once "controlador/C_verificacion.php";
        $verificar = new C_verificacion();
        $verificar ->verificarCodigo();
    ?>
</form>