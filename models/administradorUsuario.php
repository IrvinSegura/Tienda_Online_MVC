 <?php
     class AdministradorUsuario{
	private $db;
	private $result;

	public function __construct() {
		$this -> result = array();
	}

	public function get_usuario($usuario,$password) {
		$this -> db = AccesoDatos::conexion();
		$this -> db -> real_query("SELECT * FROM usuario  WHERE  usuario='".$usuario."' and password='".$password. "'");
	if (!$query = $this -> db -> store_result()) {
			printf("2. get_corte_limit Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		while ($row = $query -> fetch_assoc()) {
			$this -> result[] = $row;
		}
		return $this -> result;
		$this -> db -> close();
	}



}

        ?>