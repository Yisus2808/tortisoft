<?php
require_once "modelo/M_actualizarPass.php";
// clase actualizar password
class C_actualizarPass {
    static public function actualizarPass()
    {
        // obtenemos el email por get de la url
        $email = $_GET["email"];
        ?>
        <!-- formulario sencillo para actualizar la contraseña -->
        <label class="form-label" style="margin-top:70px;font-family:arial;font-size:24px;">Cambiar contraseña</label>
        <hr style="color:#9da5a5">
        <label class="form-label">Contraseña nueva*</label>
        <input type="password" class="form-control" name="contrasenia" required><br>
        <label class="form-label">Repetir contraseña nueva*</label>
        <input type="password" class="form-control" name="Vcontrasenia" required><br>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
        </div><br>
        <div style="margin-bottom: 70px"></div>
        <?php
        
        // validar que exista el metodo post
        if(isset($_POST['contrasenia']))
        {
            // coparar que ambas contraseñas sean la misma
            if($_POST['contrasenia'] == $_POST['Vcontrasenia']) {

                // tabla a utilizar
                $tabla = 'acceso';

                //creamos un arreglo para los datos recibidos
                $datosControlador = array("contrasenia"=>$_POST['contrasenia'], "Vcontrasenia"=>$_POST['Vcontrasenia']);
                // hacemos el llamado al modelo, enviando los datos a actualizar y la tabla
                $respuesta = M_actualizarPass::actualizarPass($email, $datosControlador, $tabla);
                // si la respuesta es ok, los datos se actualizaron
                if($respuesta=="ok"){
                    ?>
                    <!-- aquí va el sweetAlert -->
                    <script type="text/javascript">
                        Swal.fire({
                        icon: 'success',
                        title: 'Listo',
                        text: 'Contraseña actualizada',
                        ConfirmButtonText: true,
                        allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                //Volver a abrir la página
                                window.location.href='index.php?accion=inicio_sesion';
                            } 
                        })
                    </script>
                    <?php
                }
            }
            // datos no actualizados
            else{
                ?>
                <!-- aquí va el sweetAlert -->
                <script type="text/javascript">
                    Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Contraseña no actualizada',
                    ConfirmButtonText: true,
                    allowOutsideClick: false,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            //Volver a abrir la página
                            //window.location.href='index.php?accion=cambiar_contrasenia';
                        } 
                    })
                </script>
                <?php
            }
        }
    }
}

?>