<?php 
require_once "modelo/M_registrarse.php";
// clase principal del registro controlador
class C_registrarse {

    // funcion para registrarse
    static public function registrarse() {
        ?>
        <!-- Formulario sencillo de registro -->
        <label class="form-label" style="margin-top:30px;font-family:arial;font-size:24px;">Crear cuenta</label>
        <hr style="color:#9da5a5">
        <label class="form-label">Correo*</label>
        <input type="email" class="form-control" name="correo" required><br>
        <label class="form-label">Contraseña*</label>
        <input type="password" class="form-control" name="contrasenia" required minlength="8"><br>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </div>
        <div style="margin-bottom: 30px"></div>
        <div class="d-grid gap-2">
            <a href="index.php?accion=login"><button type="button" class="btn btn-primary">Regresar</button></a>
        </div>
        
        <?php
        // Validar que el correo no este registrado
        if(isset($_POST['correo']))
        {   
            // guardamos la tabla
            $tabla = 'acceso';
            // Y obtenemos el correo desde el metodo post
            $datosControlador = array("correo"=>$_POST['correo']);

            // creamos la peticion al modelo, enviando los datos
            $respuesta = M_registrarse::correoExistente($datosControlador, $tabla);

            if($respuesta=="registrado"){
                ?>
                <!-- aquí va el sweetAlert -->
                <script type="text/javascript">
                    Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al usar este correo',
                    ConfirmButtonText: true,
                    allowOutsideClick: false,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            //Volver a abrir la página
                            window.location.href='index.php?accion=registrarse';
                        } 
                    })
                </script>
                <?php
            }
            // en caso de que no este registrado lo registrara
            else{
                // nombre de la tabla de la bd
                $tabla2 = 'acceso';
                // los datos en un arreglo a enviar
                $datosControlador2 = array("correo"=>$_POST['correo'],"contrasenia"=>$_POST['contrasenia']);
                // el envido de los datos a mi modelo de registro
                $respuesta2 = M_registrarse::registrarse($datosControlador2, $tabla2);

                // recoger la respuesta
                if ($respuesta2='ok'){
                    // si se registro guardare el correo en una sesión
                    $correo = $_POST['correo'];
                    $_SESSION['correo'] = $correo;
                ?>
                    <!-- aquí va el sweetAlert -->
                    <script type="text/javascript">
                        Swal.fire({
                        icon: 'success',
                        title: 'Listo',
                        text: 'Datos de acceso registrados',
                        ConfirmButtonText: true,
                        allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                //enviamos a la página principal
                                window.location.href='index.php?accion=principal';
                            } 
                        })
                    </script>
                <?php
                }
                // en el caso de no registrar mostramos un error
                else{
                    ?>
                    <!-- aquí va el sweetAlert -->
                    <script type="text/javascript">
                        Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Datos de acceso no registrados',
                        ConfirmButtonText: true,
                        allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                //Volver a abrir la página
                                window.location.href='index.php?accion=registrarse';
                            } 
                        })
                    </script>
                    <?php
                }
            }
        }
    }
}
?>