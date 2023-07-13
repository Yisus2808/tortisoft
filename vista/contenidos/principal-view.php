<?php
    if(!isset($_SESSION['correo'])){
        header('Location: index.php?accion=login');
    }
    else{
?>  
    <h1>Bienvenid@ </h1> <?php echo $_SESSION['correo'] ?>
    <br>
    <a href="index.php?accion=cerrar_sesion" class="btn btn-danger" type="button">Cerrar sesión</a>
<?php
    }
?>