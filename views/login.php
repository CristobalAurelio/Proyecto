<?php
include "./views/page_data.php";
include "./config/conexion.php";
$con = new Conexion();
$con->conectarse(false);
?>
<form action="./controllers/controller_users.php?folder=" method="POST">
    <div class="container mt-5 mb-5" style="display:flex;">
        <div class="form">
            <div class="username">
                <input class="input_" type="text" placeholder="e-mail" name="correo" id="correo" required />
            </div>
            <div class="password">
                <input class="input_" type="text" placeholder="password" id="pass" name="pass" required />
            </div>
            <div class="login">
                <input class="input_" type="submit" name="login" value="LOGIN" style="border:none;">
            </div>
            <div class="container d-flex">
                <span style="margin-left: auto; margin-right: auto; color: black;">¿No tiene una cuenta?
                    <a href="./index.php?page=signup&title=SignIn" style="color:red;-webkit-text-stroke: none;" ;>
                        ¡Registrarse!
                    </a></span>
            </div>

            <?php
            if (isset($_GET['success'])) {
                ?>
                <script type="text/javascript">
                    $(document).ready(function () {
                        alertify.sucess("Ingresado correctamente!");
                    })
                </script>

                <?php
            } else if (isset($_GET['error'])) {
                ?>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            alertify.error("El usuario o contraseña son incorrectos.");
                        })
                    </script>
                </div>
            <?php

            }
            ?>

    </div>
    </div>
</form>