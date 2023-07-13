<?php
require_once "modelo/M_logearse.php";
class C_logearse
{
    static public function login()
    {
?>  
        <!-- Formulario sencillo para iniciar sesión -->
        <label class="form-label" style="margin-top:70px;font-family:arial;font-size:24px;">Iniciar Sesión</label>
        <hr style="color:#9da5a5">
        <label class="form-label">Correo*</label>
        <input type="email" class="form-control" name="correo" required><br>
        <label class="form-label">Contraseña*</label>
        <input type="password" class="form-control" name="contrasenia" required><br>
        <a class="form-label" href="index.php?accion=registrarse"><button type="button" class="btn btn-primary">Crear cuenta nueva</button></a><br><br>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </div><br>
        <a class="form-label" href="index.php?accion=restablecer"><button type="button" class="btn btn-primary">Olvide mi contraseña</button></a><br>
        <div style="margin-bottom: 70px"></div>
        <?php

        // Validar el submit de que existan los datos en el post
        if (isset($_POST['correo']) && isset($_POST['contrasenia'])) {
            $tabla = 'acceso';
            $correo = $_POST['correo'];
            
            //creamos un arreglo para los datos recibidos
            $datosControlador = array("correo" => $_POST['correo'], "contrasenia" => $_POST['contrasenia']);
            $respuesta = M_logearse::logearse($datosControlador, $tabla);

            if ($respuesta == "ok") {
                $_SESSION['correo'] = $correo;
                // echo "login";
        ?>
                <!-- aquí va el sweetAlert -->
                <script type="text/javascript">
                    Swal.fire({
                        icon: 'success',
                        title: 'Listo',
                        text: 'Ha iniciado sesión correctamente',
                        ConfirmButtonText: true,
                        allowOutsideClick: false,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            //Volver a abrir la página
                            window.location.href = 'index.php?accion=principal';
                        }
                    })
                </script>
            <?php
            } else {
                // echo "no login";
            ?>
                <!-- aquí va el sweetAlert -->
                <script type="text/javascript">
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'correo o contraseña incorrectos',
                        ConfirmButtonText: true,
                        allowOutsideClick: false,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            //Volver a abrir la página
                            window.location.href = 'index.php?accion=login';
                        }
                    })
                </script>
<?php
            }
        }
    }
}

?>