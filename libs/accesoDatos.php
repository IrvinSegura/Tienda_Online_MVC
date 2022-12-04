<?php 
class AccesoDatos{
	#CONEXION
	public static function conexion(){
		$mysqli = new mysqli('localhost', 'root', '', 'alumndb102');
		$mysqli->query("SET NAMES 'utf8'");
		if($mysqli->connect_error){
			die("Error de: (".$mysqli->connect_error.")");
		}
		return $mysqli;
	}
	
	#RUTA ABSOLUTA
	
	#ENCRIPTACION
	public static function encriptar($cadena){
	    $key='';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
	    $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
	    return $encrypted; //Devuelve el string encriptado 
	}
 
	public static function desencriptar($cadena){
	     $key='';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
	     $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
	    return $decrypted;  //Devuelve el string desencriptado
	}
	
	#CLAVE MD5
	public static function generador($cadena){
		$clave = "a12b34dsakcsuklmdsa";
		$cat=md5($clave.$cadena);
		return $cat;
	}
	
	public static function fechas($day,$num)
	{	
		$fecha = date('Y-m-j',strtotime($day));
		$nuevafecha = strtotime ( '+'.$num.' day' , strtotime ( $fecha ) ) ;
		$nuevafecha = date ( 'Y-m-d' , $nuevafecha );
		return $nuevafecha;
	}
}
?>