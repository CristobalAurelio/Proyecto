<?php
?>
<form action="./controllers/controller.php?folder=<?= $_GET['folder']; ?>" method="POST">
  <div class="form-group">
      <div class="row">
        <div class="col text-center">
          <i class="material-icons" style="font-size: 80px;">mail</i>
        </div>
      </div>
      <div class="row row_margin_top">
        <div class="col-2">
          <label class="font-weight-bold">Para</label>
        </div>
        <div class="col">
          <span><?= $_GET['nombre']; ?></span>
          <input type="hidden" name="emailNombre" value="<?= $_GET['nombre']; ?>">
        </div>
      </div>
      <div class="row row_margin_top">
        <div class="col-2">
          <label for="emailDestination" class="font-weight-bold">Destino</label>
        </div>
        <div class="col">
          <input type="email" class="form-control" id="emailDestination" name="emailDestination" placeholder="Para" required value="<?= $_GET['correo']; ?>">
        </div>
      </div>
      <div class="row row_margin_top">
        <div class="col-2">
          <label for="emailSubject" class="font-weight-bold">Asunto</label>
        </div>
        <div class="col">
          <input type="text" class="form-control" id="emailSubject" autofocus name="emailSubject" placeholder="Asunto" required>
        </div>
      </div>
      <div class="row row_margin_top">
        <div class="col-2">
          <label for="emailBody" class="font-weight-bold">Mensaje</label>
        </div>
        <div class="col">
          <textarea id="emailBody" name="emailBody" class="form-control" rows="5"></textarea>
        </div>
      </div>
    
  </div>
  
  <div class="form-group text-center">
  	<input type="submit" name="newEmail" value="Enviar" class="btn btn-primary">
  </div>
  <div class="form-group text-center">
  	<?php
  		if(isset($_GET['success'])){
	?>
			<div class="alert alert-success">
        E-mail enviado.
			</div>
	<?php
  		}else if(isset($_GET['error'])){
  	?>
			<div class="alert alert-danger">
				<!-- No se pudo enviar el e-mail. -->
        <?= $_GET['error_message']; ?>
			</div>
	<?php
  		}
  	?>
  </div>
</form>