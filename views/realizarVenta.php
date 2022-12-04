<?php
	@session_start();
	if(!isset($_SESSION["usuario"])) header("Location:  ../index.php");

require('../pdf/fpdf.php');
if(!empty($_POST["nombreCliente"])&&($_POST["apellidopCliente"])&&($_POST["apellidomCliente"])
  &&($_POST["Direccion"])&&($_POST["telefonoCliente"])&&($_POST["numtarjetaCliente"])){    
  require("../libs/AccesoDatos.php"); 
  require("../models/Catalogos.php"); 
   require("../models/pedidos.php"); 
       require("../models/venta.php"); 
        
$nombre=$_POST["nombreCliente"];
$ap=$_POST["apellidopCliente"];
$aM=$_POST["apellidomCliente"];
$direccion=$_POST["Direccion"];
$telefono=$_POST["telefonoCliente"];
$tarjeta=$_POST["numtarjetaCliente"];

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 24);
$pdf->Cell(180, 20, ' TIENDA DE COSMETICOS BEAUTY STORE ', 1);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Ln(30);

$pdf->SetFont('Arial', 'I', 16);
$pdf->Cell(50, 10, 'Recibo de compra', 0);
$pdf->Ln(10);

$pdf->SetFont('Arial', 'I', 14);
$pdf->Cell(50, 10, 'Cliente: '.$nombre." ".$ap." ".$aM, 0);

$pdf->Ln(10);

$pdf->SetFont('Arial', 'I', 14);
$pdf->Cell(50, 10, 'Direccion: '.$direccion);
$pdf->Ln(10);

$pdf->SetFont('Arial', 'I', 14);
$pdf->Cell(50, 10, 'Telefono: '.$telefono, 0);
$pdf->Ln(20);
$pdf->SetFont('Arial', 'I', 16);


$pdf->Cell(50, 10, 'Nombre producto', 0);
$pdf->Cell(50, 10, 'Precio Unitario',0);
$pdf->Cell(50, 10,  'Cantidad',0);
 $pdf->Cell(50, 10, 'Precio total',0);
    $objbuscarpedido = new pedidos();
        $rowCatalogo = $objbuscarpedido->get_pedidos();
 for ($i=0; $i<count($rowCatalogo); $i++){

$pdf->Ln(10);
     
$pdf->SetFont('Arial', 'I', 12);


$pdf->Cell(50, 10,  $rowCatalogo[$i]["nombre_producto"], 0);
$pdf->Cell(50, 10, "$ ".  $rowCatalogo[$i]["precio_producto"],0);
$pdf->Cell(50, 10,   $rowCatalogo[$i]["cantidad"],0);
 $pdf->Cell(50, 10,  "$ ". $rowCatalogo[$i]["precio_total"],0);
 //$pdf->Cell(50, 10,   "<img src='".$rowCatalogo[$i]["imagen"]." width='65px'",0);
}
  $objTotalPedidos = new pedidos();
            $rowPedidosTotal = $objTotalPedidos->get_totalPedidos();
            for($i=0; $i<count($rowPedidosTotal); $i++){
    
$pdf->Ln(20);
     
$pdf->SetFont('Arial', 'I', 18);


$pdf->Cell(50, 10,"TOTAL:  ".$rowPedidosTotal[$i]["total"]
, 0);
            }
    
    $pdf->Output();
    $objTotalPedidos = new pedidos();
         $rowPedidosTotal = $objTotalPedidos->get_totalPedidos();
        
 $objbuscarpedido = new pedidos();
        $rowCatalogo = $objbuscarpedido->get_pedidos();
$objVenta = new Venta();
    for ($i=0; $i<count($rowCatalogo); $i++){
 
  $rowAddVenta = $objVenta->add_venta($rowCatalogo[$i]["nombre_producto"],$rowCatalogo[$i]["cantidad"],  $rowCatalogo[$i]["precio_total"],$_SESSION["usuario"]);
 }
   $objDeletePedidos = new pedidos();
         $rowPedidosTotal = $objDeletePedidos->delete_pedidosTodos();   
}

?>

<html>
<head>
<title>CARRITO</title>
    <meta charset="utf-8">
</head>
    <body>
    </body>
</html>

<html>
<head><title>Realizar Compra</title>
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
                       >
                        <li><a href="contacto.php">Contacto</a></li>
                      <li><a href="logout.php"> Salir</a></li>
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
        <center>
            <h1><label>DATOS PARA  ENVIO DE LA COMPRA</label></h1>
        <input type="text" name="nombreCliente" class="form-control input-lg" placeholder="Nombre Cliente" required>
        <input type="text" name="apellidopCliente" class="form-control input-lg" placeholder="Apellido Paterno" required>
        <input type="text" name="apellidomCliente" class="form-control input-lg" placeholder="Apellido Materno" required>
         <textarea  class="form-control input-lg"  type="text"  placeholder="Direccion" name="Direccion"    required></textarea>
        <input type="text" name="telefonoCliente" class="form-control input-lg" placeholder="Teléfono" required>
        <input type="number" name="numtarjetaCliente" class="form-control input-lg" placeholder="Número de tarjeta"  minlength="16" maxlength="16" required><br> 
        <input type="submit" name="btnfinalizar" value="Finalizar compra" class="btn btn-primary active">
</center>
    </form>
                     </div>
                </div> 
           </div>
       </div>
</body>
</html>