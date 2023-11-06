<?php
include dirname(__FILE__, 2) . "/config/conexion.php";
/*
 *Creación de la clase usuarios
 *
 */

class Users
{
	private $conn;
	private $link;

	private $tble_usuarios = false;
	function __construct()
	{
		$this->conn = new Conexion();
		
		$this->link = $this->conn->conectarse($this->tble_usuarios);
	}

	//Trae todos los usuarios registrados
	public function getUsers()
	{
		$query = "SELECT * FROM usuarios";
		$result = mysqli_query($this->link, $query);
		$data = array();
		while ($data[] = mysqli_fetch_assoc($result))
			;
		array_pop($data);
		return $data;
	}


	//Crea un nuevo usuario
	public function newUser($data = NULL)
	{

		$noMailrepeated = $this->noRepeatEmail($data['correo']);
		if (!$noMailrepeated) {
			$query = "INSERT INTO usuarios(nombre, edad, correo, pass, tel, direccion, rango, fecha_creacion, fecha_actualizacion) 
			VALUES ('" . $data['nombre'] . "','" .$data['edad']. "','" . $data['correo'] . "','" . $data['pass'] . "','".$data['tel']."','".$data['direccion']."','" . false . "', '" . date('Y-m-d') . "', '" . date('Y-m-d') . "')";
			$result = mysqli_query($this->link, $query);
			if (mysqli_affected_rows($this->link) > 0) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}


	}
	//Buscar repeticion de correo
	function noRepeatEmail($email = NULL)
	{

		$query = "SELECT * FROM usuarios WHERE correo LIKE '" . $email . "'";
		$result = mysqli_query($this->link, $query);
		if (mysqli_num_rows($result) > 0) {
			return true;
		} else {
			return false;
		}
	}

	//Obtiene el usuario por id
	public function getUserById($id = NULL)
	{
		if(!empty($id)){
			$query = "SELECT * FROM usuarios WHERE id=" . $id;
			$result = mysqli_query($this->link, $query);
			$data = array();
			while ($data[] = mysqli_fetch_assoc($result));
			array_pop($data);
			return $data;
		} else {
			return false;
		}
	}
	public function getUserByEmail($data = NULL){
		if (!(empty($data))) {
		$query = "SELECT * FROM usuarios WHERE correo LIKE '" . $data . "'";
		$result = mysqli_query($this->link, $query);
		
			$data = array();
			while ($data[] = mysqli_fetch_assoc($result));
			array_pop($data);
			return $data;
		} else {
			return false;
		}
	}
	//Verificar Usuario
	public function verifyUser($data = NULL)
	{
		$query = "SELECT * FROM usuarios WHERE correo LIKE '" . $data['correo'] . "'"."AND pass LIKE '" . $data['pass'] . "'";
		$result = mysqli_query($this->link, $query);
		if ($result) {
			$data = array();
			while ($data[] = mysqli_fetch_assoc($result));
			array_pop($data);
			return $data;
		} else {
			return false;
		}
	}
	//Edita Usuario
	public function setEditUser($data)
	{
		if (!empty($data['id'])) {
			$query = "UPDATE usuarios SET nombre='" . $data['nombre'] . "',  
				correo='" . $data['correo'] . "',
				pass='" . $data['pass'] . "',
                rango='" . $data['rango'] . "',
				fecha_actualizacion = '" . date('Y-m-d') . "' WHERE id=" . $data['id'];
			$result = mysqli_query($this->link, $query);
			if ($result) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	//Borra el usuario por id
	public function deleteUser($id = null)
	{
		if (!empty($id)) {
			$query = "DELETE FROM usuarios WHERE id=" . $id;
			$result = mysqli_query($this->link, $query);
			if (mysqli_affected_rows($this->link) > 0) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	//Filtro de busqueda
	public function getUsersBySearch($data = NULL)
	{
		if (!empty($data)) {
			$query = "SELECT * FROM usuarios WHERE id  LIKE'%" . $data . "%' OR nombre LIKE'%" . $data . "%' OR correo LIKE'%" . $data . "%' OR rango LIKE'%" . $data . "%' OR fecha_creacion LIKE'%" . $data . "%'";
			$result = mysqli_query($this->link, $query);
			$data = array();
			while ($data[] = mysqli_fetch_assoc($result))
				;
			array_pop($data);
			return $data;
		} else {
			return false;
		}
	}


}
?>