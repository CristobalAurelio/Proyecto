<?php
include "./views/page_data.php";
?>
<form action="./controllers/controller_users.php?folder=" method="POST">
    <div class="container mt-5 mb-5" style="display:flex;">
        <div class="form">
            <div class="password">
                <input class="input_" type="text" placeholder="nombre" name="nombre" id="nombre" required />
            </div>
            <div class="username">
                <input class="input_" type="text" placeholder="edad" name="edad" id="edad" required />
            </div>
            <div class="password">
                <input class="input_" type="text" placeholder="e-mail" name="correo" id="correo" required />
            </div>
            <div class="username">
                <input class="input_" type="text" placeholder="password" name="pass" id="pass" required />
            </div>
            <div class="password">
                <input class="input_" type="text" placeholder="telefono" name="tel" id="tel" required />
            </div>
            <div class="username">
                <input class="input_" type="text" placeholder="direccion" name="direccion" id="direccion" required />
            </div>
            <div class="login">
                <input class="input_" type="submit" name="create" value="SIGN IN" style="border:none;">
            </div>
            <div class="form-group text-center">
                <?php
                if (isset($_GET['success'])) {
                    ?>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            alertify.sucess("Sign In");
                        })
                    </script>
                    <?php
                } else if (isset($_GET['error'])) {
                    ?>
                        <script type="text/javascript">
                        $(document).ready(function () {
                            alertify.error("Correo ya registrado. Intente con otro!");
                        })
                    </script>
                    <?php
                    
                }
                ?>
            </div>
        </div>
    </div>
</form>