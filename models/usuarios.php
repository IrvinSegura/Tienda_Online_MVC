 <?php
     class Usuarios{
	private $db;
	private $result;

	public function __construct() {
		$this -> result = array();
	}
         
        public function logeo($usuario,$password) {
		$this -> db = AccesoDatos::conexion();
		$this -> db -> real_query("SELECT * FROM usuarios  WHERE  nombre_usuario='".$usuario."' and password='".$password."'");
	if (!$query = $this -> db -> store_result()) {
			printf("2. get_corte_limit Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		while ($row = $query -> fetch_assoc()) {
			$this -> result[] = $row;
		}
		return $this -> result;
		$this -> db -> close();
	}


	public function get_usuario() {
		$this -> db = AccesoDatos::conexion();
		$this -> db -> real_query("SELECT * FROM  usuarios");
	if (!$query = $this -> db -> store_result()) {
			printf("2. get_corte_limit Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		while ($row = $query -> fetch_assoc()) {
			$this -> result[] = $row;
		}
		return $this -> result;
		$this -> db -> close();
	}

         	public function get_usuarioCve($cve_usuario) {
		$this -> db = AccesoDatos::conexion();
		$this -> db -> real_query("SELECT * FROM  usuarios where cve_usuario=".$cve_usuario."");
	if (!$query = $this -> db -> store_result()) {
			printf("2. get_corte_limit Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		while ($row = $query -> fetch_assoc()) {
			$this -> result[] = $row;
		}
		return $this -> result;
		$this -> db -> close();
	}
           	public function get_usuarioTipo($usuario) {
		$this -> db = AccesoDatos::conexion();
		$this -> db -> real_query("SELECT tipo_usuario from   usuarios where nombre_usuario='".$usuario."'");
	if (!$query = $this -> db -> store_result()) {
			printf("2. get_corte_limit Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		while ($row = $query -> fetch_assoc()) {
			$this -> result[] = $row;
		}
		return $this -> result;
		$this -> db -> close();
	}

	public function add_usuario($usuario,$password,$tipoUsuario) {
		$this -> db = AccesoDatos::conexion();
	
		$query = "INSERT INTO usuarios VALUES " . " (null,'" . $usuario . "','" . $password. "','".$tipoUsuario."')";
		if (!$this -> db -> query($query)) {
			printf("4. add_usuario() Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		$this -> db -> close();
	}
         
         
         	public function update_usuario($usuario,$password,$tipoUsuario,$cve_usuario) {
		$this -> db = AccesoDatos::conexion();
	
		$query = "update usuarios set nombre_usuario='".$usuario . "', password='" . $password. "',tipo_usuario     ='".$tipoUsuario."' where cve_usuario=".$cve_usuario."";
		if (!$this -> db -> query($query)) {
			printf("4. add_usuario() Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		$this -> db -> close();
	}
         
         
         	public function delete_usuario($usuario) {
		$this -> db = AccesoDatos::conexion();

                
		$query = "delete from usuarios where cve_usuario=". $usuario."" ;
		if (!$this -> db -> query($query)) {
			printf("4. add_usuario() Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		$this -> db -> close();
	}
}
         
         

        ?>