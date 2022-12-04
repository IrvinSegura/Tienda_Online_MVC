<?php 
require("libs/AccesoDatos.php"); 
  require("models/Catalogos.php"); 
   require("models/productos.php"); 
        $objcatalogo= new Catalogos();

        

   $rowCatalogo=$objcatalogo-> get_catalogo();
 



if(!empty($_POST["cve"])){
   $cve_producto =$_POST["cve"];


$objProductos= new Productos();
$rowProductos=$objProductos->get_Ventaproductoscve($cve_producto);


}
   for ($i=0; $i<count($rowProductos); $i++){?>
                      
        <form action="views/verCarrito.php" method="post"> 
                   <h2> <p class="text-info" >Detalles del producto</p> </h2>
           <div class="col-md-5  "  >
           
                   <img src=" <?php echo "views/".$rowProductos[$i]["imagen"];?>" width="240px"  height="240px">
               <input type="hidden" name="imagen" value="<?php  echo  $rowProductos[$i]["imagen"];?>">

</div>
               <div class="col-md-7 "  >
     
<label >Nombre del Producto: </label><br>    
    <?php echo $rowProductos[$i]["producto"]; ?>
        <input type="hidden" name="nombreProducto" value="<?php  echo $rowProductos[$i]["producto"];?>">
<br><br><label >Descripcion : </label><br>    
    <?php echo $rowProductos[$i]["descripcion"]; ?>                   

<br><br><label >Precio : </label><br>    
    <?php echo "$".$rowProductos[$i]["pre_venta"]." MXN"; ?>                   
      <input type="hidden" name="precioProducto" value="<?php  echo $rowProductos[$i]["pre_venta"];?>">
                                <center>
                                                        
                                    <input  class="form-control input-lg"  type="number"  placeholder="cantidad" name="cantidad" required>  
                        <button type="submit"  class="btn btn-default"><img src="img/add_carro.png" width="50px" height="50px">Agregar a carrito</button></center>
                                 
</div>
            </form> 
               <?php }?>
                   


