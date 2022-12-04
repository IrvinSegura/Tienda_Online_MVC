<?php
     class Productos{
	private $db;
	private $result;

	public function __construct() {
		$this -> result = array();
	}
      


public function add_productos($cve_provedor,$cve_catalogo,$producto,$pre_compra,$pre_venta,$descripcion,$imagen){
		$this -> db = AccesoDatos::conexion();
	
		$query = "INSERT INTO productos VALUES " . " (null," .$cve_provedor . ",".$cve_catalogo.",'".$producto."',".$pre_compra."
        ,".$pre_venta.",'".$descripcion."','".$imagen."')";
		if (!$this -> db -> query($query)) {
			printf("4. add_catalogo() Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		$this -> db -> close();
	}
         
         public function update_productoSinImagen($cve_provedor,$cve_catalogo,$producto,$pre_compra,$pre_venta,$descripcion,$cve_producto){
		$this -> db = AccesoDatos::conexion();  
	//echo $cve_provedor."  ".$cve_catalogo."  ".$producto."  ".$pre_compra."  ".$pre_venta."  ".$descripcion."  ".$cve_producto;
		$query = "update productos set cve_provedor=" .$cve_provedor . ",cve_catalogo=".$cve_catalogo.",producto='".$producto."',pre_compra=".$pre_compra."
        ,pre_venta=".$pre_venta.",descripcion='".$descripcion."'  where cve_producto=".$cve_producto;
		if (!$this -> db -> query($query)) {
			printf("4. update producto sin imagen() Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		$this -> db -> close();
	}
         
         public function update_productoConImagen($cve_provedor,$cve_catalogo,$producto,$pre_compra,$pre_venta,$descripcion,$cve_producto,$imagen){
		$this -> db = AccesoDatos::conexion();  
	//echo $cve_provedor."  ".$cve_catalogo."  ".$producto."  ".$pre_compra."  ".$pre_venta."  ".$descripcion."  ".$cve_producto."   ".$imagen;
		$query = "update productos set cve_provedor=" .$cve_provedor . ",cve_catalogo=".$cve_catalogo.",producto='".$producto."',pre_compra=".$pre_compra."
        ,pre_venta=".$pre_venta.",descripcion='".$descripcion."' ,imagen='".$imagen."' where cve_producto=".$cve_producto;
		if (!$this -> db -> query($query)) {
			printf("4. update producto sin imagen() Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		$this -> db -> close();
	}
         
         public function get_productos() {
		$this -> db = AccesoDatos::conexion();
		$this -> db -> real_query("SELECT * FROM  productos");
	if (!$query = $this -> db -> store_result()) {
			printf("2. get_corte_limit Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		while ($row = $query -> fetch_assoc()) {
			$this -> result[] = $row;
		}
		return $this -> result;
		$this -> db -> close();
	}
         
              
         public function get_productosDetalle() {
		$this -> db = AccesoDatos::conexion();
		$this -> db -> real_query("select cve_producto , proveedor,nombre_catalogo, producto,pre_compra, pre_venta,descripcion,imagen from productos INNER JOIN proveedores on productos.cve_provedor=proveedores.cve_provedor INNER JOIN catalogo on productos.cve_catalogo=catalogo.cve_catalogo");
	if (!$query = $this -> db -> store_result()) {
			printf("2. get_corte_limit Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		while ($row = $query -> fetch_assoc()) {
			$this -> result[] = $row;
		}
		return $this -> result;
		$this -> db -> close();
	}
         
          public function get_productoscve($cve) {
		$this -> db = AccesoDatos::conexion();
		$this -> db -> real_query("SELECT * FROM  productos where cve_catalogo=".$cve);
	if (!$query = $this -> db -> store_result()) {
			printf("2. get_corte_limit Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		while ($row = $query -> fetch_assoc()) {
			$this -> result[] = $row;
		}
		return $this -> result;
		$this -> db -> close();
	}
         
         
              public function get_Ventaproductoscve($cve) {
		$this -> db = AccesoDatos::conexion();
		$this -> db -> real_query("SELECT * FROM  productos where cve_producto=".$cve);
	if (!$query = $this -> db -> store_result()) {
			printf("2. get_corte_limit Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		while ($row = $query -> fetch_assoc()) {
			$this -> result[] = $row;
		}
		return $this -> result;
		$this -> db -> close();
	}
         
                  public function get_productosrand() {
		$this -> db = AccesoDatos::conexion();
		$this -> db -> real_query("SELECT * FROM  productos  ORDER BY RAND() limit 6");
	if (!$query = $this -> db -> store_result()) {
			printf("2. get_corte_limit Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		while ($row = $query -> fetch_assoc()) {
			$this -> result[] = $row;
		}
		return $this -> result;
		$this -> db -> close();
	}


	
    public function get_productosCveProducto($cve_producto) {
	
		$this -> db = AccesoDatos::conexion();
		$this -> db -> real_query("select cve_producto ,proveedores.cve_provedor, proveedor,catalogo.cve_catalogo,nombre_catalogo, producto,pre_compra, pre_venta,descripcion,imagen from productos INNER JOIN proveedores on productos.cve_provedor=proveedores.cve_provedor INNER JOIN catalogo on productos.cve_catalogo=catalogo.cve_catalogo where cve_producto=".$cve_producto);
	if (!$query = $this -> db -> store_result()) {
			printf("2. get_corte_limit Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		while ($row = $query -> fetch_assoc()) {
			$this -> result[] = $row;
		}
		return $this -> result;
		$this -> db -> close();
	} 
         
         
         
         
        
        public function delete_producto($cve_producto) {
		$this -> db = AccesoDatos::conexion();
	
		$query = "delete from productos  where cve_producto=".$cve_producto."";
		if (!$this -> db -> query($query)) {
			printf("4. add_catalogo() Errormessage: %s\n" . $this -> db -> errno . " " . $this -> db -> error);
		}
		$this -> db -> close();
	}
         
         
            
          public function get_productosNombre($nombre) {
		$this -> db = AccesoDatos::conexion();
		$this -> db -> real_query("SELECT * FROM  productos where producto like '".$nombre."_%'");
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