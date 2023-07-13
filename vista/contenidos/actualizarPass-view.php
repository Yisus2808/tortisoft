<form method="POST" autocomplete="off">
    <?php
        require_once "controlador/C_actualizarPass.php";
        $registro = new C_actualizarPass();
        $registro ->actualizarPass();
    ?>
</form>