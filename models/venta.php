<?php
class Venta{
	private $db;
	private $result;

	public function __construct() {
		$this -> result = array();
	}
    

public function add_venta($producto,$cantidad,$total,$id_usuario){
		$this -> db = AccesoDatos::conexion();
	
		$query = "INSERT INTO ventas VALUES " . " (null,'".$producto."',".$cantidad.",".$total.",curdate(),'".$id_usuario."')";
		if (!$this -> db -> query($query)) {
			printf("1. add_pedidos() Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		$this -> db -> close();
	}

public function get_ventas() {
		$this -> db = AccesoDatos::conexion();
		$this -> db -> real_query("SELECT * FROM  ventas order by  fecha desc");
	if (!$query = $this -> db -> store_result()) {
			printf("2. get_corte_limit Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		while ($row = $query -> fetch_assoc()) {
			$this -> result[] = $row;
		}
		return $this -> result;
		$this -> db -> close();
	}

public function update_pedidos($nombre_producto,$precio_producto,$cantidad,$imagen){
		$this -> db = AccesoDatos::conexion();
		$query = "UPDATE pedidos SET nombre_producto=" .$nombre_producto . ",nombre_producto=".$nombre_producto.",precio_producto='".$precio_producto."',cantidad=".$cantidad."
        ,imagen=".imagen." WHERE nombre_producto=".$nombre_producto;
		if (!$this -> db -> query($query)) {
			printf("3. update pedido sin imagen() Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		$this -> db -> close();
	}
    
     public function delete_pedidos($idpedido) {
		$this -> db = AccesoDatos::conexion();
	
		$query = "delete from pedidos  where id_pedido =".$idpedido."";
		if (!$this -> db -> query($query)) {
			printf("4. add_catalogo() Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		$this -> db -> close();
	}
         
    public function get_contarPedidos() {
		$this -> db = AccesoDatos::conexion();
		$this -> db -> real_query("SELECT SUM(cantidad) AS cantidadProductos FROM pedidos");
	if (!$query = $this -> db -> store_result()) {
			printf("5. get_corte_limit Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		while ($row = $query -> fetch_assoc()) {
			$this -> result[] = $row;
		}
		return $this -> result;
		$this -> db -> close();
	}
    
    public function get_totalPedidos() {
		$this -> db = AccesoDatos::conexion();
		$this -> db -> real_query("SELECT SUM(precio_total) AS total FROM pedidos");
	if (!$query = $this -> db -> store_result()) {
			printf("6. get_corte_limit Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		while ($row = $query -> fetch_assoc()) {
			$this -> result[] = $row;
		}
		return $this -> result;
		$this -> db -> close();
	}
    
    public function get_pedidoExistente($nombreProducto) {
	
		$this -> db = AccesoDatos::conexion();
		$this -> db -> real_query("SELECT nombre_producto FROM pedidos WHERE nombre_producto='".$nombreProducto."'");
        if (!$query = $this -> db -> store_result()) {
			printf("7. Error en get_cve_grado_estudios ErrorMessage: %s\n", $this -> db -> errno . " " . $this -> db -> error);
		}
		while ($row = $query -> fetch_assoc()) {
			$this -> result[] = $row;
		}
		return $this -> result;
		$this -> db -> close();
	}
    
    public function update_pedidosCantidad($nombre_producto,$cantidad){
		$this -> db = AccesoDatos::conexion();
		$query = "UPDATE pedidos SET cantidad=cantidad+".$cantidad." WHERE nombre_producto='".$nombre_producto."'";
		if (!$this -> db -> query($query)) {
			printf("3. update pedido sin imagen() Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		$this -> db -> close();
	}
    
      public function update_pedidosPrecioTotal($nombre_producto){
		$this -> db = AccesoDatos::conexion();
		$query = "UPDATE pedidos SET precio_total=cantidad*precio_producto WHERE nombre_producto='".$nombre_producto."'";
		if (!$this -> db -> query($query)) {
			printf("3. update pedido sin imagen() Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		$this -> db -> close();
	}
}


?>