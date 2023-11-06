<?php
class Conexion
{
	private $host;
	private $user;
	private $password;
	private $dataBase;

	public function __construct()
	{
		$this->host = "localhost"; //
		$this->user = "root"; //Usuario Base de datos
		$this->password = ""; //Contraseña de usuario de base de datos
		$this->dataBase = "floreria"; //Nombre de la base de datos
	}

	public function conectarse(bool $tble)
	{
		$enlace = mysqli_connect($this->host, $this->user, $this->password);
		$query = "CREATE DATABASE if not exists floreria DEFAULT CHARACTER SET utf8";
		$result = mysqli_query($enlace, $query);
		if (!$result){
			echo "No se pudo crear la base de datos!";
		} else {
			$enlace = mysqli_connect($this->host, $this->user, $this->password, $this->dataBase);
		}
		if ($tble) {
			if ($enlace) {
				//echo 'Conexion Exitosa'; //si la conexion fue exitosa nos muestra este mensaje como prueba, despues lo puedes poner comentarios de nuevo: //
				$query = "CREATE TABLE IF NOT EXISTS floreria.flores(
						nombre VARCHAR(60) NOT NULL,
						origen VARCHAR(60) NOT NULL,   
						id_imagen VARCHAR(60) NOT NULL,
					  ENGINE = InnoDB";
				$result = mysqli_query($enlace, $query);
				if (!$result) {
					echo "No se pudo crear la tabla de flores!";
				}
			} else {
				die('Error de Conexión (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
			}
		} else {
			if ($enlace) {
				//echo 'Conexion Exitosa';	//si la conexion fue exitosa nos muestra este mensaje como prueba, despues lo puedes poner comentarios de nuevo: //
				$query = "CREATE TABLE IF NOT EXISTS floreria.usuarios(
						id INT NOT NULL AUTO_INCREMENT,
						nombre VARCHAR(60) NOT NULL,   
						edad VARCHAR(2) NOT NULL,
						correo VARCHAR(60) NOT NULL,
						pass VARCHAR(60) NOT NULL,
						tel VARCHAR(10) NOT NULL,
						direccion VARCHAR(60) NOT NULL,
						rango BOOLEAN NOT NULL,
						fecha_creacion DATE NOT NULL,
						fecha_actualizacion DATE NOT NULL,
						PRIMARY KEY (id))
					  ENGINE = InnoDB";
				$result = mysqli_query($enlace, $query);
				if (!$result) {
					echo "No se pudo crear la tabla de usuarios!";
				}
				$query = "SELECT * FROM usuarios WHERE correo='admin1@outlook.com' AND rango='1'";
				$result = mysqli_query($enlace, $query);
				if(!mysqli_num_rows($result) > 0){
					$query = "INSERT INTO usuarios(nombre, edad, correo, pass, tel, direccion, rango, fecha_creacion, fecha_actualizacion) VALUES
					('Admin1', '00', 'admin1@outlook.com', 'Admin01', '0000000000', '...', true,'".date("Y-m-d")."','" . date('Y-m-d') . "')";
					$result = mysqli_query($enlace, $query);
				}
			} else {
				die('Error de Conexión (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
			}
		}
		//mysqli_close($enlace); //cierra la conexion a nuestra base de datos, un ounto de seguridad importante.

		return ($enlace);
		
	}
}