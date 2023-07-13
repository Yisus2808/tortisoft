<?php
require_once "modelo/M_restablecer.php";
require_once "modelo/M_registrarse.php";
// Clase principal de la recuperación controlador
class C_restablecer
{
    static public function restablecer($mail, $codigo)
    {
?>
        <!-- Formulario sencillo -->
        <label class="form-label" style="margin-top:30px;font-family:arial;font-size:24px;">Ingrese su correo</label>
        <hr style="color:#9da5a5">
        <label class="form-label">Correo*</label>
        <input type="email" class="form-control" name="correo" required><br>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Siguiente</button>
        </div>
        <div class="d-grid gap-2">
            <a href="index.php?accion=login"><button type="button" class="btn btn-primary">Regresar</button></a>
        </div>
        <div style="margin-bottom: 30px"></div>
        <?php

        // Validar que este correo este registrado
        if (isset($_POST['correo'])) {
            // guardamos la tabla
            $tabla = 'acceso';
            // Y obtenemos el correo desde el metodo post
            $datoCorreo = array("correo" => $_POST['correo']);

            // creamos la peticion al modelo, enviando los datos
            $respuesta = M_registrarse::correoExistente($datoCorreo, $tabla);

            // si esta registrado, la respuesta sera "registrado"
            if ($respuesta == "registrado") {

                // Si esta registrado, ahora obtenemos su ID ó PK
                $obtenerPk = M_restablecer::obtenerDatos($datoCorreo, $tabla);
                $email = $obtenerPk['correo'];
                $pk = $obtenerPk['accesoid'];

                // Varios destinatarios
                try {
                    //Server settings
                    $mail->SMTPDebug = 0;   //Enable verbose debug output
                    $mail->isSMTP();    //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';   //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;   //Enable SMTP authentication
                    $mail->Username   = 'ejuanjesus18@gmail.com';   //SMTP username
                    $mail->Password   = 'xjivnzsgplalzvps'; //SMTP password
                    $mail->SMTPSecure = 'TLS';  //Enable implicit TLS encryption
                    $mail->Port       = 587;    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    // Emisor
                    $mail->setFrom('ejuanjesus18@gmail.com', 'Recuperacion de contrasenia');
                    // Receptor
                    $mail->addAddress($email);

                    //Content
                    $mail->isHTML(true);    //Set email format to HTML
                    $mail->Subject = 'Codigo de recuperacion';
                    $mail->Body    = 'El código de verificación es: ' . $codigo;
                    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    // enviamos el correo
                    if ($mail->send()) {

                        // Si se envio, guardaremos el código enviado, y el id del usuario que solicito el restablecimiento
                        $registrar = M_restablecer::registrarCodigo($pk, $codigo, 'codigo_verificacion');

                        // Si el registro del codigo es ok, pasamos a la página de verificación del código
                        if ($registrar == 'ok') {
                            header('Location: index.php?accion=verificacion&email=' . urlencode($email));
                        } else {
                            echo "Error al registrar el código";
                        }
                    }
                    $enviado = true;
                } catch (Exception $e) {
                    echo "Mensaje no enviado. Mailer Error: {$mail->ErrorInfo}";
                    $enviado = false;
                }
            } else {
        ?>
                <!-- aquí va el sweetAlert -->
                <script type="text/javascript">
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'El correo ingresado no está registrado',
                        ConfirmButtonText: true,
                        allowOutsideClick: false,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            //Volver a abrir la página
                            window.location.href = 'index.php?accion=restablecer';
                        }
                    })
                </script>
<?php

            }
        }
    }
}

?>