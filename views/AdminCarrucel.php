<?php
	@session_start();
	if(!isset($_SESSION["usuario"])) header("Location:  ../index.php");
require("../libs/AccesoDatos.php");                
  require("../models/Slider.php");
if(!empty($_POST['id'])){
 
   
    \error_reporting(E_ALL ^ E_NOTICE);
$ruta="../img/slider/";
$nom="slider".$_POST['id'];
$archivo=$_FILES['imagen']['tmp_name'];
$nom_archivo=$_FILES['imagen']['name'];
$ext=  pathinfo($nom_archivo);
        
     
            $subir = move_uploaded_file($archivo,$ruta."/".$nom.".".$ext['extension']);
if ($subir)
{   
 
        $rutaBD="img/slider/";      
$foto=$rutaBD."/".$nom.".".$ext['extension'];
   $objSlider2= new Slider();
        $modSlider=$objSlider2->update_slider($_POST['id'],$foto);
}
else
{echo 'Error al subir ';
    
        } 
}
?>
<html>
<head>
 <title>Administrar carrucel</title>
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
    
	<title>ADMINISTRADOR</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="Beauty Store">
	<meta name="keywords" content="posicionamiento web">
	<meta name="author" content="UTTEC">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
  
<body>


    
    <center>
       
    <h2><p class="text-info" >Administrar carrucel</p> </h2>
        </center>
      <div class="col-md-12">
            <form action="Administrador.php"><input type="submit" value="Volver al menu principal" class="btn btn-danger"></form>
            </div>
        <div class="col-md-12"  class="tablaCarrito">
            <center> <div class="col-md-1"  ></div>
               <div class="col-md-10"  >
            
               <table class="table table-hover table-dark"  id="tblDatos">
                   <thead class="thead-dark">
                    <tr>
                      <th scope="col">Imagen</th>
                      <th scope="col">Cambiar</th>
                    </tr>
                    </thead>
                    <?php 
   
                $objSlider= new Slider();
        $rowSlider=$objSlider->get_pedidos();
                
                 for ($i=0; $i<count($rowSlider); $i++){
                      
                ?>
		<tr><td><img src="../<?php echo $rowSlider[$i]["imagen"]  ?>"alt="" width="160px" height="160px"></td>
              <td>     <form enctype="multipart/form-data"  action="AdminCarrucel.php" method="post">
        
                   <input type="file" name="imagen" accept="image/jpeg, image/png ,image/jpg image/gif" type="file" name="imagen"  value="default.png"/>
                    
                  <input type="hidden" name="id" value="<?php echo $rowSlider[$i]["id_imagen"];?>" required>
                  <br>
                  <button type="submit" >Guardar Cambio</button>
                  </form>
        </td>
</tr>
       <?php  }?> 
    </table>
                </div>     </center>
   
                 <br>
                 <br>
            <div class="col-md-12">
           
            </div>
        </div>
    </body>
</html>