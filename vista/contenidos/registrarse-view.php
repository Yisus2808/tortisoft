<form method="POST" autocomplete="off">
    <?php
      require_once "controlador/C_registrarse.php";
      $registro = new C_registrarse();
      $registro ->registrarse();
    ?>
  </form>