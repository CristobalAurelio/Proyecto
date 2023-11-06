<?php

include './models/admin/users.php';
$user = new Users();

//Si utiliza el filtro de busqueda
if (isset($search)) {
	$users = $user->getUsersBySearch($dataSearch);
} else {
	//Trae todos los usuarios
	$dataSearch = NULL;
	$users = $user->getAgenda();
}

$title = "Listado de Usuarios";
?>
<div class="row">
	<div class="col text-center py-3">
		<i class="fa-solid fa-users fa-beat" style="font-size: 70px;"></i>
	</div>
</div>
<div class="row">
	<div class="col py-4" style="display: flex; justify-content: center; align-items: center;">
		<form action="./index.php?folder=users&page=users" method="post" accept-charset="utf-8" class="form-inline">
			<div class="form-group mx-sm-3 mb-2">
				<input type="text" class="form-control" name="dataSearch" autofocus placeholder="Buscador"
					value="<?= $dataSearch ?>">
			</div>
			<div class="container" style="padding-left: 33%;">
			<button type="submit" name="btnSearch" class="btn btn-primary mb-2">Buscar</button>
</div>
		</form>
	</div>
</div>
<div class="container">
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover table-sm text-center">
			<thead class="thead-dark">
				<th>Id</th>
				<th class="text-center">Nombre</th>
				<th class="text-center">Edad</th>
				<th class="text-center">Correo</th>
				<th class="text-center">Contraseña</th>
				<th class="text-center">Telefono</th>
				<th class="text-center">Direccion</th>

				<th class="text-center">Rango</th>
				<th class="text-center">Fecha de Creacion</th>
				<th class="text-center">Fecha de Actualizacion</th>
				<th class="text-center"></th>
			</thead>
			<tbody>
				<?php

				if (count($users) > 0) {

					foreach ($users as $column => $value) {
						?>

						<tr id="row<?= $value['id']; ?>">
							<td>
								<?= $value['id']; ?>
							</td>
							<td>
								<?= $value['nombre']; ?>
							</td>
							<td>
								<?= $value['edad']; ?>
							</td>
							<td><a href="./index.php?page=new_email&correo=<?= $value['correo']; ?>&folder=email&nombre=<?= $value['nombre']; ?>"
									title="Enviar correo electrónico.">
									<?= $value['correo']; ?>
								</a></td>
								<td>
									<?= $value['pass']; ?></a>
								</td>
								<td>
									<?= $value['tel']; ?>
								</td>
								<td>
									<?= $value['direccion']; ?>
								</td>
								<td>
									<?= $value['rango']; ?>
								</td>
								<td>
									<?= $value['fecha_creacion']; ?></a>
								</td>
								<td>
									<?= $value['fecha_actualizacion']; ?></a>
								</td>
								<td class="text-center">
									<a href="./index.php?page=edit&title=Editar Usuarios&id=<?= $value['id'] ?>&folder=users"
										title="Editar usuario: <?= $value['nombre'] ?>">
										<i class="material-icons btn_edit">edit</i>
									</a>



									<a href="#" onclick="objUser.deleteUser(<?= $value['id'] ?>)" id="btnDeleteUser"
										title="Borrar usuario: <?= $value['id'] . ': ' . $value['nombre'] ?>">
										<i class="material-icons btn_delete">delete_forever</i>
									</a>
								</td>
						</tr>

						<?php
					}
				} else {
					?>
					<tr>
						<td colspan="8">
							<div class="alert alert-info">
								No se encontraron usuarios.
							</div>
						</td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="row">
		<div class="col">
			<div class="alert alert-success" id="msgSuccess" style="display: none;"></div>
			<div class="alert alert-danger" id="msgDanger" style="display: none;"></div>
		</div>
	</div>
</div>