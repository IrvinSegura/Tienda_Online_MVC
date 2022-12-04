<?php
	@session_start();
	if(!isset($_SESSION["usuario"])) header("Location:  ../index.php");

 require("../libs/AccesoDatos.php"); 
  require("../models/usuarios.php"); 
 require("../models/Catalogos.php"); 
  require("../models/Proveedores.php"); 
  require("../models/Productos.php"); 
 
      
        $objproveedor= new Proveedores();

 $rowprovedores=$objproveedor->get_proveedores();
        $objcatalogo= new Catalogos();

           $rowCatalogo=$objcatalogo->get_catalogo();
      
    
    	if(!empty($_POST['producto'])&&!empty($_POST['precioCompra'])&&!empty($_POST['precioVenta'])){

    
        
    

\error_reporting(E_ALL ^ E_NOTICE);
$ruta="FotosProductos/";
$nom=$_POST['producto'];
$archivo=$_FILES['imagen']['tmp_name'];
$nom_archivo=$_FILES['imagen']['name'];
$ext=  pathinfo($nom_archivo);
        
     
            $subir = move_uploaded_file($archivo,$ruta."/".$nom.".".$ext['extension']);
if ($subir)
{    echo 'El archivo se subio con exito';

 $proveedor=$_POST['proveedor'];
   $catalogo=$_POST['catalogo'];
  $producto=$_POST['producto'];
    $precioCompra=$_POST['precioCompra'];
   $precioVenta=$_POST['precioVenta'];
  
    echo  $descripcion=$_POST['Descripcion'];
        $foto=$ruta.$nom.".".$ext['extension'];
  $objProducto= new Productos();
        $rowproductos=$objProducto->add_productos($proveedor,$catalogo,$producto,$precioCompra,$precioVenta,$descripcion,$foto);
              header('Location: productosVendedor.php');

}
else
{echo 'Error al subir ';



 $proveedor=$_POST['proveedor'];
   $catalogo=$_POST['catalogo'];
  $producto=$_POST['producto'];
    $precioCompra=$_POST['precioCompra'];
   $precioVenta=$_POST['precioVenta'];
  
    echo  $descripcion=$_POST['Descripcion'];
        $foto="FotosProductos/default.png";
  $objProducto= new Productos();
        $rowproductos=$objProducto->add_productos($proveedor,$catalogo,$producto,$precioCompra,$precioVenta,$descripcion,$foto);
              header('Location: productosVendedor.php');





}
   

    //require("../../libs/AccesoDatos.php"); 
//        require("../../models/alumnos.php");  
       /* $objAlumno= new Alumnos();
        $rowAlumno=$objAlumno->add_alumno($nombre,$correo,$telefono,$foto);
       header('Location: Alumnos.php');
    */
    }
    

        
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
     <script src="../script/script.js"></script>
            
   
    

	<title>Nuevo Producto</title>
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
                <input type="text" class="form-control" placeholder="Search">
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
                       <li><a href="vendedor.php">Vendedor</a></li>
                        <li><a href="ProductosVendedor.php">Productos</a></li>
                     
                        
                        <li><a href="logout.php"> Salir</a></li>
                        
                       
                       
                    </ul>
                </div>
            </div>   

            
        </nav>
        
      

        <div class="clearfix"></div>
            <div class="section">
            </div>

            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="../bootstrap/js/bootstrap.min.js"></script>
            <script src="../bootstrap/js/bootsnav.js"></script>
            
       
    <div class="container" >
           <div class="row">
               <br>
           
             <div class="col-md-12 well" >
            
              <center>
                   <h2> <p class="text-info" > Nuevo Producto</p> </h2>
           
                </center>
   
             
                 
                    </div>
            <br>
            <br>
            <br>
               <div class="col-md-12">
                               <form enctype="multipart/form-data"  action="#" method="post">
                            
                    
            
                                 
                   <br>
                   <div class="col-md-3">
                         Selecciona Imagen del producto 
         <input type="file" name="imagen" accept="image/jpeg, image/png ,image/jpg image/gif" type="file" name="imagen"  value="default.png"/>
                    
                   <img src="FotosProductos/default.png" width="250px"  height="250px">
                 
                   </div>
                  <br>
               
                             
                   <h6> <p class="text-info" >Datos  del producto</p> </h6>
                       <div class="col-md-3">
                      
                        <select  name="proveedor" class="form-control" required>
                        <option>Proveedor</option>  
                          
                    <?php            for ($i=0; $i<count($rowprovedores); $i++){?>
                          <option value="<?php echo $rowprovedores[$i]["cve_provedor"]; ?>">
                        <?php echo  $rowprovedores[$i]["proveedor"];?>
                             <?php }?>
                             </option>
                          </select><br>
                                             <select  name="catalogo" class="form-control" required>
                        <option>Catalogo</option>  
                    <?php            for ($i=0; $i<count($rowCatalogo); $i++){?>
                          <option value="<?php echo $rowCatalogo[$i]["cve_catalogo"]; ?>">
                        <?php echo $rowCatalogo[$i]["nombre_catalogo"];?>
                             
                             </option>
                  <?php }?>
                    
                          
                            
                        </select>
                     
                    
                        
                          <br>
                            <input  class="form-control input-lg"  type="text"  placeholder="Nombre del Producto" name="producto" required>
                                
                      
                        
                        <input  class="form-control input-lg"  type="number"  placeholder="Precio compra" name="precioCompra" required>
                    
                        <input  class="form-control input-lg"  type="number"  placeholder="Precio venta" name="precioVenta" required>
                          
                        </div>                   
                           
                       
                   
            
                            
               
                       
                       
                           
                        
                        
            <div class="col-md-6">
                                 <textarea  class="form-control input-lg"  type="text"  placeholder="Descripcion" name="Descripcion"   rows="10" cols="50" required></textarea>
                        <br><br>
                                   </div>
                        

                                   <br><br>
                        
                         <center>     <button type="submit" class="btn btn" ><img src="../img/agregar.png" width="50px" height="50px">Agregar Nuevo Producto</button></center>
                         

             
    
                         

                     
                       <br><br>
                       
                       
                   </form>

               
               </div>
            
            
               
               
               
                   
               
               
               
            </div></div><br><br><br>
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
</body>
</html>