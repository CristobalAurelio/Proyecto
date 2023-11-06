<?php
	include dirname(__file__,3)."/config/conexion.php";
	/**
	*
	*/
	class Users
	{
		private $conn;
		private $link;

		function __construct()
		{
			$this->conn   = new Conexion();
			$this->link   = $this->conn->conectarse(false);
		}

		//Trae todos los usuarios registrados
		public function getAgenda()
		{
			$query  ="SELECT * FROM usuarios";
			$result =mysqli_query($this->link,$query);
			$data   =array();
			while ($data[]=mysqli_fetch_assoc($result));
			array_pop($data);
			return $data;
		}
		//identificar si el correo ya existe
		function noRepeatEmail($data)
	{

		$query = "SELECT * FROM usuarios WHERE correo LIKE '" . $data. "'";
		$result = mysqli_query($this->link, $query);
		if (mysqli_num_rows($result) > 0) {
			return true;
		} else {
			return false;
		}
	}
		//Crea un nuevo usuario
		public function newUser($data){
			if(isset($data['rango'])){
				if($data['rango']=="0"){
					$rango = false;
				}else{
					$rango = true;
				}
			}
			if(!$this->noRepeatEmail($data['correo'])){
				
			$query  ="INSERT INTO usuarios(nombre, edad, correo, pass, tel, direccion, rango, fecha_creacion, fecha_actualizacion)
			VALUES ('".$data['nombre']."','".$data['edad']."','".$data['correo']."','".$data['pass']."','".$data['tel']."','".$data['direccion']."','".$rango."','".date("Y-m-d")."','".date("Y-m-d")."')";
			$result = mysqli_query($this->link,$query);
			if(mysqli_affected_rows($this->link)>0){
				return true;
			}else{
				return false;
			}
			
			}
			return false;
			
			
		}

		//Obtiene el usuario por id
		public function getAgendaById($id=NULL){
			if(!empty($id)){
				$query  ="SELECT * FROM usuarios WHERE id=".$id;
				$result =mysqli_query($this->link,$query);
				$data   =array();
				while ($data[]=mysqli_fetch_assoc($result));
				array_pop($data);
				return $data;
			}else{
				return false;
			}
		}

		//Obtiene el usuario por id
		public function setEditUser($data){
			if(!empty($data['id'])){
				
				$query  ="UPDATE usuarios SET nombre='".$data['nombre']."', 
				edad='".$data['edad']."',
				correo='".$data['correo']."', 
				pass='".$data['pass']."', 
				tel='".$data['tel']."',
				direccion='".$data['direccion']."',
				rango='".$data['rango']."', 
				fecha_actualizacion = '".date('Y-m-d')."' WHERE id=".$data['id'];
				$result =mysqli_query($this->link,$query);
				if($result){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}

		//Borra el usuario por id
		public function deleteUser($id=null){
			if(!empty($id)){
				$query  ="DELETE FROM usuarios WHERE id=".$id;
				$result =mysqli_query($this->link,$query);
				if(mysqli_affected_rows($this->link)>0){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}

		//Filtro de busqueda
		public function getUsersBySearch($data=NULL){
			if(!empty($data)){
				$query  ="SELECT * FROM usuarios WHERE id  LIKE'%".$data."%' OR nombre LIKE'%".$data."%' OR correo LIKE'%".$data."%' OR rango LIKE'%".$data."%' OR fecha_creacion LIKE'%".$data."%'";
				$result =mysqli_query($this->link,$query);
				$data   =array();
				while ($data[]=mysqli_fetch_assoc($result));
				array_pop($data);
				return $data;
			}else{
				return false;
			}
		}
		//Usuarios por id
		//Obtiene el usuario por id
		public function getUserById($id=NULL){
			if(!empty($id)){
				$query  ="SELECT * FROM usuarios WHERE id=".$id;
				$result =mysqli_query($this->link,$query);
				$data   =array();
				while ($data[]=mysqli_fetch_assoc($result));
				array_pop($data);
				return $data;
			}else{
				return false;
			}
		}
	}
