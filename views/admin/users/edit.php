<?php

  include './models/users.php';
  $title="Listado de Usuarios";

  $user     = new Users();
  $id       = isset($_GET['id'])?$_GET['id']:null;
  $users    = $user->getUserById($id);
  $nombre     = '';
  $direccion = '';
  $correo    = '';
  $telefono  = '';
 $rango = NULL;
$edad = '';
$password = '';
  if($users){
    $nombre    =$users[0]['nombre'];
    $edad = $users[0]['edad'];
    $direccion =$users[0]['direccion'];
    $correo    =$users[0]['correo'];
    $telefono  =$users[0]['tel'];
    $rango = $users[0]['rango'];
    $password = $users[0]['pass'];
  }

?>
<form action="./controllers/controller.php?folder=<?= $_GET['folder']; ?>" method="POST">
  <div class="row">
    <div class="col text-center py-4">
      <i class="fa-solid fa-user-pen" style="font-size: 70px;"></i>
    </div>
  </div>
  <div class="form-group">
  	 <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" autofocus placeholder="Nombre" value="<?php echo $nombre; ?>" required>
  </div>
  <div class="form-group">
  	 <label for="edad">Edad</label>
    <input type="text" class="form-control" id="edad" name="edad" placeholder="Edad" value="<?php echo $edad; ?>" required>
  </div>
  <div class="form-group">
  	 <label for="correo">Correo</label>
    <input type="email" class="form-control" id="correo" name="correo" placeholder="E - Mail" value="<?php echo $correo; ?>" required>
  </div>
  <div class="form-group">
  	 <label for="telefono">Contraseña</label>
    <input type="text" class="form-control" id="pass" name="pass" placeholder="Contraseña"  value="<?php echo $password; ?>" required>
  </div>
  <div class="form-group">
  	 <label for="tel">Telefono</label>
    <input type="text" class="form-control" id="tel" name="tel" placeholder="Numero elefónico" value="<?php echo $telefono; ?>" required>
  </div>
  <div class="form-group">
  	 <label for="direccion">Direccion</label>
    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" value="<?php echo $direccion; ?>" required>
  </div>
  <div class="form-group">
  	 <label for="">Rango</label>
     <br>
    <input type="radio" class="radio"  name="rango" value="0" 
    <?php if(!$rango){
      ?>checked
      <?php
    }
    ?>required>
    <label for="0">User</label>
    <br>
    <input type="radio" class="radio"  name="rango" value="1" 
    <?php if($rango){
      ?>checked
      <?php
    }
    ?>required>
    <label for="1">Admin</label>

  </div>

  <div class="form-group text-center">
  	<input type="submit" name="edit" value="Editar" class="btn btn-primary">
  </div>
  <div class="form-group text-center">
  	<?php
    
  		if(isset($_GET['success'])){
	?>
			<div class="alert alert-success">
				La informacion ha sido actualizada.
			</div>
	<?php
  		}else if(isset($_GET['error'])){
  	?>
			<div class="alert alert-danger">
				Ha ocurrido un error al editar la información, por favor intente de nuevo.
			</div>
	<?php
  		}
  	?>
  </div>
  <input type="hidden" name="id" value="<?php echo $id ?>">
</form>