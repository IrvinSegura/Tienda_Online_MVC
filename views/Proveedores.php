
<?php
@session_start();
	if(!isset($_SESSION["usuario"])) header("Location:  ../index.php");
 require("../libs/AccesoDatos.php"); 
  require("../models/Proveedores.php"); 
 
      
        $objproveedor= new Proveedores();

        //$objcatalogo2= new Proveedores();

   $rowprovedores=$objproveedor->get_proveedores();

    
    /*
if(!empty($_POST["eliminar"])){
$cve_proveedor = $_POST["eliminar"];
  $rowdeletcatalogo=$objproveedor-> delete_proveedor($cve_proveedor);
            header('Location: Proveedores.php');

        }*/

if(!empty($_POST["proveedor"])&&!empty($_POST["Telefono"])&&!empty($_POST["Email"])&&!empty($_POST["Estado"])&&!empty($_POST["Municipio"])&&!empty($_POST["Localidad"])&&!empty($_POST["Calle"])&&!empty($_POST["cp"])&&!empty($_POST["Ext"])&&!empty($_POST["Int"])&&!empty($_POST["cve"])){
    echo $cve=$_POST["cve"];
     $proveedor=$_POST["proveedor"];
    $telefono=$_POST["Telefono"];
    $correo=$_POST["Email"];
     $edo=$_POST["Estado"];
    $municipio=$_POST["Municipio"];
     $localidad=$_POST["Localidad"];
     $calle=$_POST["Calle"];
     $cp=$_POST["cp"];
     $noext=$_POST["Ext"];
    
      $noInt=$_POST["Int"];

        $objproveedorUpdate= new Proveedores();
       $rowProvedorUpdate=$objproveedorUpdate->  update_proveedores($cve,$proveedor,$telefono,$correo,$edo,$municipio,$localidad,$cp,$calle,$noext,$noInt);
    header('Location: Proveedores.php');
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
    <link href="../css/barraCarrito.css" rel="stylesheet">
    
     <script src="../script/script.js"></script>
            
   
    

	<title>Proveedores</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="Beauty Store">
	<meta name="keywords" content="posicionamiento web">
	<meta name="author" content="UTTEC">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
    <style type="text/css">
.pag_btn {
    border: solid 1px;
    border-color: rgb(0, 0, 255);
    color: rgb(0, 0, 255);
    background-color: rgb(255, 255, 255);
}
 
.pag_btn_des {
    border: solid 1px;
    border-color: rgb(200, 200, 200);
    color: rgb(200, 200, 200);
    background-color: rgb(245, 245, 245);
}
 
.pag_num {
    border: solid 1px;
    border-color: rgb(0, 0, 255);
    color: rgb(255, 255, 255);
    background-color: rgb(0, 0, 255);
}
</style>
 
<script type="text/javascript">
Paginador = function(divPaginador, tabla, tamPagina)
{
    this.miDiv = divPaginador; //un DIV donde irán controles de paginación
    this.tabla = tabla;           //la tabla a paginar
    this.tamPagina = tamPagina; //el tamaño de la página (filas por página)
    this.pagActual = 1;         //asumiendo que se parte en página 1
    this.paginas = Math.floor((this.tabla.rows.length - 1) / this.tamPagina); //¿?
 
    this.SetPagina = function(num)
    {
        if (num < 0 || num > this.paginas)
            return;
 
        this.pagActual = num;
        var min = 1 + (this.pagActual - 1) * this.tamPagina;
        var max = min + this.tamPagina - 1;
 
        for(var i = 1; i < this.tabla.rows.length; i++)
        {
            if (i < min || i > max)
                this.tabla.rows[i].style.display = 'none';
            else
                this.tabla.rows[i].style.display = '';
        }
        this.miDiv.firstChild.rows[0].cells[1].innerHTML = this.pagActual;
    }
 
    this.Mostrar = function()
    {
        //Crear la tabla
        var tblPaginador = document.createElement('table');
 
        //Agregar una fila a la tabla
        var fil = tblPaginador.insertRow(tblPaginador.rows.length);
 
        //Ahora, agregar las celdas que serán los controles
        var ant = fil.insertCell(fil.cells.length);
        ant.innerHTML = 'Anterior';
        ant.className = 'pag_btn'; //con eso le asigno un estilo
        var self = this;
        ant.onclick = function()
        {
            if (self.pagActual == 1)
                return;
            self.SetPagina(self.pagActual - 1);
        }
 
        var num = fil.insertCell(fil.cells.length);
        num.innerHTML = ''; //en rigor, aún no se el número de la página
        num.className = 'pag_num';
 
        var sig = fil.insertCell(fil.cells.length);
        sig.innerHTML = 'Siguiente';
        sig.className = 'pag_btn';
        sig.onclick = function()
        {
            if (self.pagActual == self.paginas)
                return;
            self.SetPagina(self.pagActual + 1);
        }
 
        //Como ya tengo mi tabla, puedo agregarla al DIV de los controles
        this.miDiv.appendChild(tblPaginador);
 
        //¿y esto por qué?
        if (this.tabla.rows.length - 1 > this.paginas * this.tamPagina)
            this.paginas = this.paginas + 1;
 
        this.SetPagina(this.pagActual);
    }
}
</script>
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
           
             <div class="col-md-12  well" >
            
              <center>
                   <h2> <p class="text-info" > Lista de proveedores resgistrados<img src="../img/provedores.png" width="50px" height="50px">  </h2>
           
                </center>
   
          
                 
                    </div>
            
            <br>
            <br>
               
            
            
               <br><br>
                <right><a href="NuevoProveedor.php">  <h5> <img src="../img/agregar.png"width="50px" height="50px">Agregar nuevo</h5></a></right>
               <br>
                    <table class="table table-hover table-dark"  id="tblDatos">
            <thead ><br><br>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Teléfono</th>    
            <th scope="col">Correo</th>    
            <th scope="col">Estado</th>    
            <th scope="col">Municipio</th>    
            <th scope="col">Localidad</th>    
            <th scope="col">C.P.</th>
            <th scope="col">Calle</th>
            <th scope="col">No. Ext</th>    
            <th scope="col">No. Int</th>    
        
                
        
                
            </tr>
            </thead>
            <tbody>
      
                  <?php 


                  for ($i=0; $i<count($rowprovedores); $i++){



                  ?>
                <tr>
            <th scope="row"><?php  echo  $i; ?></th>
            <td><?php echo  $rowprovedores[$i]["proveedor"]; ?></td>
            <td><?php echo  $rowprovedores[$i]["telefono"]; ?></td>        
            <td><?php echo  $rowprovedores[$i]["correo"]; ?></td>        
            <td><?php echo  $rowprovedores[$i]["edo"]; ?></td>        
            <td><?php echo  $rowprovedores[$i]["municipio"]; ?></td>        
            <td><?php echo  $rowprovedores[$i]["localidad"]; ?></td>        
            <td><?php echo  $rowprovedores[$i]["cp"]; ?></td>        
            <td><?php echo  $rowprovedores[$i]["calle"]; ?></td>        
            <td><?php echo  $rowprovedores[$i]["noext"]; ?></td>   
            <td><?php echo  $rowprovedores[$i]["noInt"]; ?></td>        
            
            
                <td>
                <form action="EliminarProveedor.php" method="post">
             <button type="submit" class="btn btn-danger">
                  <img src="../img/eliminar.png" width="25px" height="25px">Eliminar </button>
                <input type="hidden" name="eliminar" value="<?php  echo  $rowprovedores[$i]["cve_provedor"]; ?>">

                </form></td>
                    
                 <td>
                <form action="modificarProveedor.php" method="post">
             <button type="submit" class="btn btn-danger">
                 <img src="../img/modificar.png" width="25px" height="25px"> Modificar </button>
                <input type="hidden" name="modificar" value="<?php  echo  $rowprovedores[$i]["cve_provedor"]; ?>">

                </form></td>
            </tr>
            <?php } ?>
            </tbody>   
           
               
                     </table>
               
               <center> <div id="paginador"></div></center>
            <script type="text/javascript">
            var p = new Paginador(
            document.getElementById('paginador'),
            document.getElementById('tblDatos'),
            5
            );
            p.Mostrar();   
            </script> 
               <div class="col-md-2"></div>
               <div class="col-md-10">
            
               <?php 
               
               
               
if(!empty($_POST["modificar"])){
    $cve_proveedor = $_POST["modificar"];
    $objproveedor2= new Proveedores();
    $rowprovedoresModificar=$objproveedor2->get_proveedoresCve($cve_proveedor);
    
    
                  for ($i=0; $i<count($rowprovedoresModificar); $i++){



                 
            $cve=$rowprovedoresModificar[$i]["cve_provedor"];
           
            $proveedor=$rowprovedoresModificar[$i]["proveedor"];
            $telefono =$rowprovedoresModificar[$i]["telefono"];      
            $correo=$rowprovedoresModificar[$i]["correo"];        
            $edo=$rowprovedoresModificar[$i]["edo"];        
            $municipio=$rowprovedoresModificar[$i]["municipio"];        
            $localidad=$rowprovedoresModificar[$i]["localidad"];        
           $cp=$rowprovedoresModificar[$i]["cp"];       
            $calle=$rowprovedoresModificar[$i]["calle"];         
        $noext=$rowprovedoresModificar[$i]["noext"];   
            $noInt=$rowprovedoresModificar[$i]["noInt"];        
            }
    
    ?>
    
                   
                     <form action="Proveedores.php" method="post">
                            
                    
            
               <div class="col-md-10 well">
                <input type="hidden" name="cve" value="<?php  echo  $cve ?>">
                    <h5> <p class="text-info" >Datos de Provedor a Modificar</p> </h5>
                      <div class="col-md-3">
                        <input  class="form-control input-lg"  type="text"   value="<?php echo  $proveedor; ?>"name="proveedor" required>
                        </div>                   
                        <div class="col-md-4">
                        <input  class="form-control input-lg"  type="number" value="<?php echo  $telefono; ?>"  name="Telefono" required>
                        </div>
                            
                        <div class="col-md-4">
                        <input  class="form-control input-lg"  type="email" value=" <?php echo   $correo; ?> "name="Email" required>
                        </div>
                            
                            
                         

                       </div>
                       <br><br>
                       
                       <div class="col-md-10 well">
               
                    <h5> <p class="text-info" >Datos de direcciòn</p> </h5>
                      <div class="col-md-3">
                       <label>Estado:</label> <input  class="form-control input-lg"  type="text"   value=" <?php echo   $edo; ?> "name="Estado" required>
                        </div>  
                        <div class="col-md-3">
                        <label>Municipio</label><input  class="form-control input-lg"  type="text"value=" <?php echo     $municipio; ?> "  name="Municipio" required>
                        </div>
                           
                        <div class="col-md-3">
                        <label>localidad:</label><input  class="form-control input-lg"  type="text" value=" <?php echo $localidad; ?> "  name="Localidad" required>
                        </div>
                           
                        
                        <div class="col-md-3">
                       <label>calle:</label> <input  class="form-control input-lg"  type="text"  value=" <?php echo $calle; ?> " name="Calle" required>
                        </div>   <br>
                        <div class="col-md-3"><br>
                        <label>CP:</label><input  class="form-control input-lg"  type="text" value=" <?php echo   $cp; ?> "name="cp" required>
                        </div>
                             <div class="col-md-3"><br>
                        <label>No Ext:</label><input  class="form-control input-lg"  type="text"  value=" <?php echo   $noext; ?> " name="Ext" required>
                        </div>
                        
                             <div class="col-md-3"><br>
                        <label>No Int</label><input  class="form-control input-lg"  type="text" value=" <?php echo   $noInt; ?> " name="Int" required>
                        </div>
                            <br><br> <br><br><br><br>
                          <center>     <button type="submit" class="btn btn-primary btn-lg active" >Modificar Proveedor</button></center>
                         

                       </div>
                  

                   </form>
<?php } ?>

               
               
               
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