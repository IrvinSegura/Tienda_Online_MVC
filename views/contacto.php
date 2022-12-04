
<?php 

if(!empty($_POST["nombre"])&&!empty($_POST["correo"])&&!empty($_POST["mensaje"])){
    echo $v1 = $_POST['mensaje'];

 $v2 = $_POST['correo'];

$destino="esmeraldach2003@gmail.com";

$asunto=" comentario de :".$_POST["nombre"]."";
$mensaje=$v1;
//$desde="esmeraldach2003@gmail.com";

mail(utf8_decode($destino),utf8_decode($asunto),utf8_decode($mensaje),utf8_decode($desde));
    
}
?>

<html>

    
<head><title>Contáctanos</title>
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
      require("../libs/AccesoDatos.php");           
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
             <div class="col-md-2"  ></div>
                 <div class="col-md-1"> </div>
                 <div class="col-md-7 well">
                     <div class="col-md-2"></div>
                     <div class="col-md-7">
                   <form action="#" method="post">
        <center><br><br>
     <h2> 
    <p class="text-info" >Envía tus comentarios </p> 
    </h2>
        <label>Nombre</label><br><br><input type="text" name="nombre" placeholder="Escribe tu nombre" class="form-control input-lg" required>
        <label>Correo</label><br><br><input type="email" name="correo" placeholder="Escribe tu correo"  class="form-control input-lg" required>
       <label>Mensaje</label><br><br> 
        <textarea cols="5" name="mensaje"  placeholder="Escribe tu mensaje..." class="form-control input-lg" required></textarea>
        <br><br><input type="submit" name="enviar" value="Enviar" class="btn btn-primary active">
</center>
    </form>
                     </div>
                </div> 
           </div>
       </div>
</body>
</html>