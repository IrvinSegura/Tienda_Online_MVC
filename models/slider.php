<?php
class Slider{
	private $db;
	private $result;

	public function __construct() {
		$this -> result = array();
	}
    

public function add_pedidos($nombre_producto,$precio_producto,$cantidad,$precio_total,$imagen){
		$this -> db = AccesoDatos::conexion();
	
		$query = "INSERT INTO pedidos VALUES " . " (null,'".$nombre_producto."',".$precio_producto.",".$cantidad.",".$precio_total.",'".$imagen."')";
		if (!$this -> db -> query($query)) {
			printf("1. add_pedidos() Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		$this -> db -> close();
	}

public function get_pedidos() {
		$this -> db = AccesoDatos::conexion();
		$this -> db -> real_query("SELECT * FROM  slider");
	if (!$query = $this -> db -> store_result()) {
			printf("2. get_corte_limit Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		while ($row = $query -> fetch_assoc()) {
			$this -> result[] = $row;
		}
		return $this -> result;
		$this -> db -> close();
	}
   public function update_slider($id,$imagen){
		$this -> db = AccesoDatos::conexion();
		$query = "UPDATE slider SET imagen='".$imagen."' WHERE id_imagen=".$id."";
		if (!$this -> db -> query($query)) {
			printf("3. update pedido sin imagen() Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		$this -> db -> close();
	}
}


?>