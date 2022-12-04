
<?php
	@session_start();
	if(!isset($_SESSION["usuario"])) header("Location:  ../index.php");

 require("../libs/AccesoDatos.php"); 
  require("../models/usuarios.php"); 
 
        $objUsuarios= new Usuarios();
        $rowUsuario=$objUsuarios-> get_usuario();

if(isset($_POST["tipousuario"]) &&isset($_POST["usuario"])&&isset($_POST["password"])) {
 
     $tipoUsuario=$_POST["tipousuario"];
    
     $usuario=$_POST["usuario"];
    
    $password=$_POST["password"];
    
    $objUsuarios2= new Usuarios();
        $rowAddUsuario=$objUsuarios2->add_usuario($usuario,$password,$tipoUsuario);
    
      header('Location: Administrador.php');
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
            
   
    

	<title>Nuevo Usuario</title>
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
                       <li><a href="Administrador.php">Admin</a></li>
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
               <br>
             <div class="col-md-12" >
             <div class="col-md-4" ></div>
                <div class="col-md-5 well" >
              <center>
                   <h2> <p class="text-info" >Registrar Nuevo Usuario</p> </h2>
        <form action="NuevoUsuario.php" method="post">
        <center>
        <br>
        <br>
       <select class="form-control" name="tipousuario" >
        <option>Selectiona tipo de usuario</option>
        <option value="Administrador">Administrador</option>
        
        <option value="Vendedor">Vendedor</option>
        <option value="Secretaria">Secretaria</option>
             <option value="Cliente">Cliente</option>
        
            </select>
            <br>
        <input  class="form-control input-lg"  type="text"  placeholder="&#128102; Usuario" name="usuario" required><br>
        <br>
        <input  class="form-control input-lg" type="text" placeholder="&#128273; Contraseña" name="password" required>
        <br>
        <br>
     
      <button type="submit" class="btn btn" ><img src="../img/agregar.png" width="50px" height="50px">   Registar Usuario</button>
    </center>
    </form>  
                 </center>
                 </div>
               </div></div>
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
    
</body>
</html>