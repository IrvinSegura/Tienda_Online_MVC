<?php 
require("../libs/AccesoDatos.php"); 
  require("../models/productos.php"); 
$producto=$_POST["producto"];

$objProductos= new Productos();
        $rowProductos=$objProductos-> get_productosNombre($producto);
         
if($rowProductos==null){
    echo "NO SE ENCONTRARON PRODUCTOS";
}
        for ($i=0; $i<count($rowProductos); $i++){
                ?>

                     <form action="views/verCarrito.php" method="post">      
<!--
//                for($i=1;$i<10;$i++){
//
//                    echo "<a href=''><img src='img/productos/".rand(1,$i+rand(rand(1,5),10)).".jpg' width='180px' height='180px' ></a>&nbsp; &nbsp;&nbsp ";
//
//                    if($i%3==0){
//                        echo "<br><br>";
//
//                    }
-->          <div class="col-md-4 "  >
               
                    <table>
              
                        <tr>
                            <td>
                <img src="<?php  echo  $rowProductos[$i]["imagen"];?>"width='200px' height='180px'  onclick="detalleproducto('<?php  echo  $rowProductos[$i]["cve_producto"];?>');">     
               <input type="hidden" name="imagen" value="<?php  echo  $rowProductos[$i]["imagen"];?>">
                            </td>
                            </tr>
                       
                         <tr>
                            <td>
                              <center>  
                                  <label name="nombreProducto"><?php  echo $rowProductos[$i]["producto"];?></label> 
                                <input type="hidden" name="nombreProducto" value="<?php  echo $rowProductos[$i]["producto"];?>">
                                </center>     
               
                            </td>
                            </tr> 
                         <tr>
                            <td><center>
                                <label>$: <?php  echo $rowProductos[$i]["pre_venta"];?> MX</label>  
                                <input type="hidden" name="precioProducto" value="<?php  echo $rowProductos[$i]["pre_venta"];?>">
               </center>
                            </td>
                            </tr> 
                         <tr>
                            <td>
                                
                                <center>
                                    <input  class="form-control input-lg"  type="number"  placeholder="cantidad" name="cantidad" id="cantidadProductos" required>  
                                    <button type="submit"  class="btn btn-default" >
                            
                            <img src="../img/add_carro.png" width="50px" height="50px">Agregar a carrito</button></center>
                                

                            </td>
                            </tr>
                        <br><br>
                     </table> </div>
                       </form> 
            <?php  }?>