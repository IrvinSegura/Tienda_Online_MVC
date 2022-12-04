
<?php
@session_start();
	if(!isset($_SESSION["usuario"])) header("Location:  ../index.php");
 require("../libs/AccesoDatos.php"); 
  require("../models/Proveedores.php"); 
 
      
        $objproveedor= new Proveedores();

        //$objcatalogo2= new Proveedores();

  

if(!empty($_POST["proveedor"])&&!empty($_POST["Telefono"])&&!empty($_POST["Email"])&&!empty($_POST["Estado"])&&!empty($_POST["Municipio"])&&!empty($_POST["Localidad"])&&!empty($_POST["Calle"])&&!empty($_POST["cp"])&&!empty($_POST["Ext"])&&!empty($_POST["Int"])){
    $proveedor=$_POST["proveedor"];
    $telefono=$_POST["Telefono"];
    $correo=$_POST["Email"];
    $edo=$_POST["Estado"];
    $municipio=$_POST["Municipio"];
    $localidad=$_POST["Localidad"];
    $calle=$_POST["Calle"];
    $cp=$_POST["cp"];
    $Ext=$_POST["Ext"];
    
     $Int=$_POST["Int"];
    
    $rowproveedorExiatente=$objproveedor->get_proveedoreExistente($proveedor);
$existe=null;
  for ($i=0; $i<count($rowproveedorExiatente); $i++){
         $existe=$rowproveedorExiatente[$i]["proveedor"];
        }
        
        if($existe==null){

            $rowProvedorAdd=$objproveedor-> add_proveedores($proveedor,$telefono,$correo,$edo,$municipio,$localidad,$cp,$calle,$Ext,$Int);
    header('Location: Proveedores.php');

}else{
            $mensaje = "Ese provedor ya esta registrado ";
echo "<script>";
echo "alert('$mensaje');";  
echo "window.location = 'Proveedores.php';";
echo "</script>"; 
//header('Location: catalogos.php');
            
        }
    
    

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
            
   
    

	<title>Nuevo Proveedor</title>
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
                     <li><a href="Administrador.php">Administrador</a></li>
                        <li><a href="Productos.php">Productos</a></li>
                          <li><a href="catalogos.php">Catalogos </a></li>
                        <li><a href="Proveedores.php">Proveedores</a></li>
                        
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
           
             <div class="col-md-12 well " >
            
              <center>
                   <h2> <p class="text-info" > Nuevo Proveedor <img src="../img/provedores.png" width="50px" height="50px"></p> </h2>
           
                </center>
   
             
                 
                    </div>
            
            <br>
            <br>
              
               <div class="col-md-12">
                               <form action="NuevoProveedor.php" method="post">
                            
                    
            
               <div class="col-md-12 ">
               <br>
                    <div class="col-md-1">
                
                        </div>    
                    <h5> <p class="text-info" >Datos del proveedor</p> </h5>
                   
                      <div class="col-md-1">
                
                        </div>  <div class="col-md-3">
                        <input  class="form-control input-lg"  type="text"  placeholder="Nombre de proveedor" name="proveedor" required>
                        </div>                   
                        <div class="col-md-3">
                        <input  class="form-control input-lg"  type="tel"  placeholder="Teléfono" name="Telefono" required>
                        </div>
                            
                        <div class="col-md-5">
                        <input  class="form-control input-lg"  type="email"  placeholder="Email" name="Email" required>
                        </div>
                   <br><br><br><br>
                    <h5>     <div class="col-md-1">
                
                        </div>   <p class="text-info" >Datos de dirección</p> </h5>  <br>
                            <div class="col-md-3">
                        <input  class="form-control input-lg"  type="text"  placeholder="Estado" name="Estado" required>
                        </div>  
                        <div class="col-md-3">
                        <input  class="form-control input-lg"  type="text"  placeholder="Municipio" name="Municipio" required>
                        </div>
                           
                        <div class="col-md-3">
                        <input  class="form-control input-lg"  type="text"  placeholder="Localidad" name="Localidad" required>
                        </div>
                            
                            <div class="col-md-1">
                
                        </div>     
                        <div class="col-md-3">
                        <input  class="form-control input-lg"  type="text"  placeholder="Calle" name="Calle" required>
                        </div> 
                        <div class="col-md-2">
                        <input  class="form-control input-lg"  type="number"  placeholder="C.P." name="cp" required>
                        </div>
                             <div class="col-md-2">
                        <input  class="form-control input-lg"  type="number"  placeholder="Número Ext" name="Ext" required>
                        </div>
                        
                             <div class="col-md-2">
                        <input  class="form-control input-lg"  type="number"  placeholder="Número Int" name="Int" required>
                        </div>
                            <br><br> <br><br><br><br>
                   <br>
                          <center> 
                         <button type="submit" class="btn btn" ><img src="../img/agregar.png" width="50px" height="50px">     Agregar Nuevo Proveedor</button></center>
                         

                       </div>
                  

                   </form>

               
               </div>
            
            
               
               
               
                   
               
               
               
            </div></div>
            <br>
    <br>
    <br>
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