<?php 
require("../libs/AccesoDatos.php"); 
  require("../models/Catalogos.php"); 
   require("../models/productos.php"); 
require("../models/pedidos.php"); 
        $objcatalogo= new Catalogos();
        

   $rowCatalogo=$objcatalogo-> get_catalogo();
 

$objProductos= new Productos();
$rowProductos=$objProductos->  get_productos();
?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href="../bootstrap/css/animate.css" rel="stylesheet">
    <link href="../bootstrap/css/bootsnav.css" rel="stylesheet">
    <link href="../bootstrap/css/style.css" rel="stylesheet">
    <link href="../css/barraCarrito.css" rel="stylesheet">
     <script src="../script/script.js"></script>
          <script src="../script/script2.js"></script>
                  
   
    

	<title>Productos</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="Beauty Store">
	<meta name="keywords" content="posicionamiento web">
	<meta name="author" content="UTTEC">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>

<body>

	<header>
			<div class="slider">
			<ul>
            <?php 
                 
  require("../models/Slider.php");
                $objSlider= new Slider();
        $rowSlider=$objSlider->get_pedidos();
                
                 for ($i=0; $i<count($rowSlider); $i++){
                      
                ?>
		<img src="../<?php echo $rowSlider[$i]["imagen"]  ?>"alt="">
        

       <?php  }?>
            </ul>
		</div>
	</header>

	   <nav class="navbar navbar-default bootsnav"  style="background-color: #FF69B4;">
            <div class="top-search">
                <div class="container">
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control"name="search" id="search" placeholder="Search" onkeyup="buscadorProductos2();">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
                </div>
            </div>
            
        
            <div class="container">            
                <div class="attr-nav">
                <ul>
                <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
               
                </ul>
                </div>
            
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                    </button>
                   
                </div>
            
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                         <li><a href="../index.php">Inicio</a></li>
                          <li><a href="productoscliente.php">Productos</a></li>
                        <li><a href="contacto.php">Contacto</a></li>
                        <li><a href="Login.php">Iniciar sesión</a></li>
                     <li><a href="conocenos.php"> Conocenos</a></li>
                         &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;
                        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;
                        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;
                        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;
                        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;
                       
                       
                    </ul>
                </div>
            </div>   

            
        </nav>
        <?php  
            $objContarPedido = new pedidos();
            $rowPedidos = $objContarPedido->get_contarPedidos();
                  for ($i=0; $i<count($rowPedidos); $i++){
                      
        ?>
       <div class="barraCarrito">
          <form action="verCarrito.php" >
        <table>
            <tr><td>Número de productos: <?php echo $rowPedidos[$i]["cantidadProductos"] ?></td><?php } ?><td><button type="submit" ><img src="../img/proceso.png">Ver carrito</button></td>
            </tr>  
            <?php 
            $objTotalPedidos = new pedidos();
            $rowPedidosTotal = $objTotalPedidos->get_totalPedidos();
            for($i=0; $i<count($rowPedidosTotal); $i++){?>
            <tr><td>Total a pagar:  <?php echo $rowPedidosTotal[$i]["total"] ?></td></tr>
           <?php }?>
        </table></form>
      </div>

        <div class="clearfix"></div>
            <div class="section">
            </div>

            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="../bootstrap/js/bootstrap.min.js"></script>
            <script src="../bootstrap/js/bootsnav.js"></script>
            
        <div class="container" >
           <div class="row">
               <br>
               <br>
          <div class="col-md-3"  >
            
                 
                 <table class="table well">
                    <thead class="thead-dark">
                    <tr>
                    <th><h4> <p class="text-info" >Categorias</p> </h4></th>
                    </tr>
                    </thead>
                      
                  <?php 


                  for ($i=0; $i<count($rowCatalogo); $i++){



                  ?>  
                <tbody>
                    <tr>
                    <center>
                        <form method="post" action="../categoria.php">
                            <input type="hidden" value="<?php echo $rowCatalogo[$i]["cve_catalogo"];?>" name="categoria">
                        <td><button type="submit" class="btn btn-link"><?php echo $rowCatalogo[$i]["nombre_catalogo"];?></button></td>
                  </form>
                            </center>
                        
                    </tr>
                    
                   

            </tbody>
                     <?php }?>
        </table>
    
                 <br>
                 <br>
                      
    </div>
                 <div class="col-md-1 "  >
               </div>
          <div class="col-md-7 " id="contenido" >
                    
             
       <?php
                
        for ($i=0; $i<count($rowProductos); $i++){
                ?>

                     <form action="verCarrito.php" method="post">      
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
                <img src="<?php  echo  $rowProductos[$i]["imagen"];?>"width='200px' height='180px'  onclick=" detalleproducto('<?php  echo  $rowProductos[$i]["cve_producto"];?>');">     
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
               </div>
               
               
           </div>
       </div>
    <footer class="page-footer "style="background-color: #FF69B4;">
<br>
<br>

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
    <a href="https://mdbootstrap.com/bootstrap-tutorial/"> Beauty store</a><br>
  <a href="https://mdbootstrap.com/bootstrap-tutorial/"> Muchas gracias por visitarnos</a>
        </div>
  <!-- Copyright -->
<br>
        <br>
</footer>
<!-- Footer -->
    
</body>
</html>