<?php
	
?>
<form action="./controllers/controller.php?folder=<?= $_GET['folder']; ?>" method="POST">
  <div class="row">
    <div class="col text-center py-4">
      <i class="fa-solid fa-user-plus" style="font-size: 70px;"></i>
    </div>
  </div>
  <div class="form-group">
  	 <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" autofocus placeholder="Nombre" required>
  </div>
  <div class="form-group">
  	 <label for="edad">Edad</label>
    <input type="text" class="form-control" id="edad" name="edad" placeholder="Edad" required>
  </div>
  <div class="form-group">
  	 <label for="correo">Correo</label>
    <input type="email" class="form-control" id="correo" name="correo" placeholder="E - Mail" required>
  </div>
  <div class="form-group">
  	 <label for="telefono">Contraseña</label>
    <input type="text" class="form-control" id="pass" name="pass" placeholder="Contraseña" required>
  </div>
  <div class="form-group">
  	 <label for="tel">Telefono</label>
    <input type="text" class="form-control" id="tel" name="tel" placeholder="Tu numero telefónico" required>
  </div>
  <div class="form-group">
  	 <label for="direccion">Direccion</label>
    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" required>
  </div>
  <div class="form-group">
  	 <label for="">Rango</label>
     <br>
    <input type="radio" class="radio"  name="rango" value="0" required>
    <label for="0">User</label>
    <br>
    <input type="radio" class="radio"  name="rango" value="1"required>
    <label for="1">Admin</label>

  </div>
  <div class="form-group text-center">
  	<input type="submit" name="create" value="Crear" class="btn btn-primary">
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
                            alertify.error("Correo ya existente con ese rango.");
                        })
                    </script>
                </div>
            <?php

            }
            ?>
</form>