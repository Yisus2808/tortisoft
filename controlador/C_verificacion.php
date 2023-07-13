<?php
require_once "modelo/M_verificacion.php";
// clase principal de la verifiacion del código
class C_verificacion {
    // función para verificar el código
    static public function verificarCodigo()
    {
        // obtener el get de la url
        $email = $_GET["email"];
        ?>
        <!-- Formulario sencillo -->
        <label class="form-label" style="margin-top:70px;font-family:arial;font-size:24px;">Escribir código de verificación</label>
        <hr style="color:#9da5a5">
        <label class="form-label">Código*</label>
        <input type="text" class="form-control" name="codigoPost" required maxlength="5" oninput="if(this.value.length > this.maxLength) this.value=this.value.slice(0, this.maxLength);" onkeypress="return solonumeros(event)"><br>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Verificar</button>
        </div><br>
        <div style="margin-bottom: 70px"></div>            
        <?php
        // Obtener el códgio más reciente para este correo
        $respuesta = M_verificacion::obtenerCodigo($email, 'codigo_verificacion');
        
        // guardamos este código
        $codigo = $respuesta['codigo'];
        // echo $codigo;

        // verificar el código POST, con el código de la bd guardado
        if(isset($_POST['codigoPost']))
        {
            // aquí hacemos la comparación
            if($_POST['codigoPost'] == $codigo){
            ?>
            <!-- aquí va el sweetAlert -->
                <script type="text/javascript">
                    Swal.fire({
                    icon: 'success',
                    title: 'Listo',
                    text: 'El código es correcto',
                    ConfirmButtonText: true,
                    allowOutsideClick: false,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            //enviamos a cambiar la contraseña
                            window.location.href='index.php?accion=actualizarPass&email=<?php echo $email?>';
                        } 
                    })
                </script>
            <?php
            }
            else{
                ?>
                <!-- aquí va el sweetAlert -->
                <script type="text/javascript">
                    Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El código es incorrecto',
                    ConfirmButtonText: true,
                    allowOutsideClick: false,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            //Volver a abrir la página
                            //window.location.href='index.php?accion=verificacion';
                        } 
                    })
                </script>
                <?php
            }
        }
        ?>
        <script type="text/javascript">
            function solonumeros(e){
                key=e.keyCode || e.which;
                teclado=String.fromCharCode(key);
                numeros=" 0123456789.";
                especiales="8-37-38-46" //array
                teclado_especial=false;
                for(var i in especiales){

                    if(key==especiales[i]){
                        teclado_especial=true;
                    }
                }

                if(numeros.indexOf(teclado)==-1 && !teclado_especial){
                    return false;
                }
            }
        </script>
        <?php
    }
}

?>
