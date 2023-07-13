<form method="POST" autocomplete="off">
    <?php
        require_once "controlador/C_logearse.php";
        $login = new C_logearse();
        $login->login();
    ?>
</form>