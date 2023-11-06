<?php
	include dirname(__file__,2).'/models/admin/users.php';
	include dirname(__file__,2).'/models/admin/SendEmail.php';

	$users=new Users();
	$sendMail=new SendEmail();

	//Request: creacion de nuevo usuario
	if(isset($_POST['create']))
	{
		if($users->newUser($_POST)){
			header('location: ../index.php?page=new&success=true&folder='.$_GET['folder']);
		}else{
			header('location: ../index.php?page=new&error=true&folder='.$_GET['folder']);
		}
	}

	//Request: editar usuario
	if(isset($_POST['edit']))
	{
		if($users->setEditUser($_POST)){
			header('location: ../index.php?page=edit&id='.$_POST['id'].'&success=true&folder='.$_GET['folder']);
		}else{
			header('location: ../index.php?page=edit&id='.$_POST['id'].'&error=true&folder='.$_GET['folder']);
		}
	}

	//Request: editar usuario
	if(isset($_GET['delete']))
	{
		if($users->deleteUser($_GET['id'])){
			echo json_encode(["success"=>true]);
		}else{
			echo json_encode(["error"=>true]);
		}
	}
	/*if(isset($_POST['delete'])){
		if($users->deleteUser($_POST['id'])){
			header('location: ../index.php?page=users&success=true&folder=users');
		}else{
			header('location: ../index.php?page=users&error=true&folder=users');
		}
	}*/

	//Request: Enviar email
	if(isset($_POST['newEmail']))
	{
    	$mail=$sendMail->newEmail("","",$_POST['emailDestination'],$_POST['emailNombre'],$_POST['emailSubject'],$_POST['emailBody']);
		if($mail===true){
			header("location: ../index.php?page=new_email&success=true&folder={$_GET['folder']}&email={$_POST['emailDestination']}&nombre={$_POST['emailNombre']}");
		}else{
			header("location: ../index.php?page=new_email&error=true&folder={$_GET['folder']}&email={$_POST['emailDestination']}&nombre={$_POST['emailNombre']}&error_message={$mail}");
		}
	}

?>