<?php
     class Catalogos{
	private $db;
	private $result;

	public function __construct() {
		$this -> result = array();
	}
      


	public function add_catalogo($nombre) {
		$this -> db = AccesoDatos::conexion();
	
		$query = "INSERT INTO catalogo VALUES " . " (null,'" . $nombre. "')";
		if (!$this -> db -> query($query)) {
			printf("1. add_catalogo() Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		$this -> db -> close();
	}
         
         
	public function update_catalogo($cve,$nombre) {
		$this -> db = AccesoDatos::conexion();
	
		$query = "update catalogo set nombre_catalogo='".$nombre. "' where cve_catalogo=".$cve;
		if (!$this -> db -> query($query)) {
			printf("2. update_pedido() Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		$this -> db -> close();
	}
         
         public function get_catalogo() {
		$this -> db = AccesoDatos::conexion();
		$this -> db -> real_query("SELECT * FROM  catalogo LIMIT 10");
	if (!$query = $this -> db -> store_result()) {
			printf("3. get_corte_limit Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		while ($row = $query -> fetch_assoc()) {
			$this -> result[] = $row;
		}
		return $this -> result;
		$this -> db -> close();
	}
           
         public function get_catalogocve($cve) {
		$this -> db = AccesoDatos::conexion();
		$this -> db -> real_query("SELECT * FROM  catalogo where cve_catalogo=".$cve);
	if (!$query = $this -> db -> store_result()) {
			printf("4. get_corte_limit Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		while ($row = $query -> fetch_assoc()) {
			$this -> result[] = $row;
		}
		return $this -> result;
		$this -> db -> close();
	}

    public function get_catalogoExistente($nombreCatalogo) {
	
		$this -> db = AccesoDatos::conexion();
		$this -> db -> real_query("SELECT  nombre_catalogo FROM catalogo where nombre_catalogo='".$nombreCatalogo."'");
        if (!$query = $this -> db -> store_result()) {
			printf("5. Error en get_cve_grado_estudios ErrorMessage: %s\n", $this -> db -> errno . " " . $this -> db -> error);
		}
		while ($row = $query -> fetch_assoc()) {
			$this -> result[] = $row;
		}
		return $this -> result;
		$this -> db -> close();
	}
	
    public function delete_catalogo($cve_catalogo) {
		$this -> db = AccesoDatos::conexion();
		$query = "DELETE FROM catalogo WHERE cve_catalogo=".$cve_catalogo."";
		if (!$this -> db -> query($query)) {
			printf("6. delete_pedido() Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		$this -> db -> close();
	}
         
}

        ?>