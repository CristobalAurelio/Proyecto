<?php
include dirname(__file__,2).'/models/users.php';
include dirname(__file__,2).'/models/articulos.php';

$users=new Users();

//Request: creacion de nuevo usuario
if(isset($_POST['create']))
{
    if($users->newUser($_POST)){
        header('location: ../index.php?page=login&success=true&folder='.$_GET['folder']);
    }else{
        header('location: ../index.php?page=signup&error=true&folder='.$_GET['folder']);
    }
}
if(isset($_POST['login'])){
    if($users->verifyUser($_POST)){
        $data = $users->getUserByEmail($_POST['correo']);

        if(!$data[0]['rango']){
            
            header('location: ../index.php?page=toolbar&folder=usuario&correo='.$_POST['correo'].'&sucess=true&title=Flowers House ♥');
        }else{
            header('location: ../index.php?page=users&folder=users&sucess=true&title=ADMIN');
        }
       
    }else{
        header('location: ../index.php?page=login&folder='.$_GET['folder'].'&error=true');
    }
}
?>