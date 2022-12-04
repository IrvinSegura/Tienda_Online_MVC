<?php
     class Proveedores{
	private $db;
	private $result;

	public function __construct() {
		$this -> result = array();
	}
      


public function add_proveedores($proveedor,$telefono,$correo,$edo,$municipio,$localidad,$cp,$calle,$noext,$noInt){
		$this -> db = AccesoDatos::conexion();
	
		$query = "INSERT INTO proveedores VALUES " . " (null,'" . $proveedor. "',".$telefono.",'".$correo."','".$edo."'
        ,'".$municipio."','".$localidad."',".$cp.",'".$calle."','".$noext."','".$noInt."')";
		if (!$this -> db -> query($query)) {
			printf("4. add_catalogo() Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		$this -> db -> close();
	}
         
         public function update_proveedores($cve,$proveedor,$telefono,$correo,$edo,$municipio,$localidad,$cp,$calle,$noext,$noInt){
		$this -> db = AccesoDatos::conexion();
	
		$query = "update proveedores set proveedor='" . $proveedor. "',telefono=".$telefono.",correo='".$correo."',edo='".$edo."'
        ,municipio='".$municipio."',localidad='".$localidad."',cp=".$cp.",calle='".$calle."',noext='".$noext."',noInt='".$noInt."' where cve_provedor=".$cve."";
		if (!$this -> db -> query($query)) {
			printf("4. add_catalogo() Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		$this -> db -> close();
	}
         
         public function get_proveedores() {
		$this -> db = AccesoDatos::conexion();
		$this -> db -> real_query("SELECT * FROM  proveedores");
	if (!$query = $this -> db -> store_result()) {
			printf("2. get_corte_limit Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		while ($row = $query -> fetch_assoc()) {
			$this -> result[] = $row;
		}
		return $this -> result;
		$this -> db -> close();
	}


                public function get_proveedoreExistente($nombreProveedor) {
	
		$this -> db = AccesoDatos::conexion();
		$this -> db -> real_query("SELECT  proveedor FROM proveedores where proveedor='".$nombreProveedor."'");
if (!$query = $this -> db -> store_result()) {
			printf("3. Error en get_cve_grado_estudios ErrorMessage: %s\n", $this -> db -> errno . " " . $this -> db -> error);
		}
		while ($row = $query -> fetch_assoc()) {
			$this -> result[] = $row;
		}
		return $this -> result;
		$this -> db -> close();
	}
	
    public function get_proveedoresCve($cve_proveedor) {
	
		$this -> db = AccesoDatos::conexion();
		$this -> db -> real_query("SELECT  * FROM proveedores where cve_provedor='".$cve_proveedor."'");
if (!$query = $this -> db -> store_result()) {
			printf("3. Error en get_cve_grado_estudios ErrorMessage: %s\n", $this -> db -> errno . " " . $this -> db -> error);
		}
		while ($row = $query -> fetch_assoc()) {
			$this -> result[] = $row;
		}
		return $this -> result;
		$this -> db -> close();
	} 
         
         
         
         
        
        public function delete_proveedor($cve_proveedor) {
		$this -> db = AccesoDatos::conexion();
	
		$query = "delete from proveedores  where cve_provedor=".$cve_proveedor."";
		if (!$this -> db -> query($query)) {
			printf("4. add_catalogo() Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		$this -> db -> close();
	}
         
}

        ?>