
<?php
	@session_start();
	if(!isset($_SESSION["usuario"])) header("Location:  ../index.php");

 require("../libs/AccesoDatos.php"); 
  require("../models/productos.php"); 
 
        $objProductos= new Productos();
        $rowProductos=$objProductos-> get_productosDetalle();
/*
	if(!empty($_POST["eliminar"])){
       $cve_producto =$_POST["eliminar"];
         $objProducto2= new Productos();
        $rowProductos2=$objProductos->delete_producto($cve_producto);
         header('Location: productos.php');
    }*/
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
            
   
    

	<title>Productos</title>
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
            
		<img src="../img/Slider/slider1.jpg"alt="">
        <img src="../img/Slider/slider2.jpg"alt="">
        <img src="../img/Slider/slider3.jpg"alt="">
        <img src="../img/Slider/slider4.jpg"alt="">
	
		
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
                     <li><a href="secretaria.php">Secretaria</a></li>
                        <li><a href="ProductosSecretaria.php">Productos</a></li>
                         
                        
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
             <div class="col-md-12 well" >
            
              <center>
                   <h2> <p class="text-info" >Lista de productos registrados<img src="../img/productos.jpg" ></p> </h2>
           
                </center>
              
                
       </div>
               <div class="col-md-12" >
                <table class="table table-hover table-dark"  id="tblDatos">
                    
                    
                    <div id="tabla"> 
  <thead ><br><br>
      <center><p class="text-info" ></p> </center>
     <right><a href="AgregarProductoSecretaria.php"> <h5><img src="../img/agregar.png" width="50px" height="50px" >Agregar nuevo</h5></a></right><br>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Proveedor</th>
      <th scope="col">Catalogo</th>
      <th scope="col">Producto</th>
      <th scope="col">Precio de compra</th>
      <th scope="col">Precio de venta</th>
      <th scope="col">Descripción</th>
      <th scope="col">Imagen</th>
      
    </tr>
  </thead>
  <tbody>
      
      <?php 
      
       
        for ($i=0; $i<count($rowProductos); $i++){
                

    
      ?>
    <tr>
      <th scope="row"><?php  echo  $i; ?></th>
      <td><?php  echo   $rowProductos[$i]["proveedor"]; ?></td>
      <td><?php  echo   $rowProductos[$i]["nombre_catalogo"];?></td>
        <td><?php  echo  $rowProductos[$i]["producto"];?></td> 
        <td><?php  echo  $rowProductos[$i]["pre_compra"];?></td> 
         <td><?php  echo  $rowProductos[$i]["pre_venta"];?></td> 
        <td><?php  echo  $rowProductos[$i]["descripcion"];?></td> 
        <td> <img src="<?php  echo  $rowProductos[$i]["imagen"];?>"width='100px' height='100px'></td> 
        
        
        
          <td>
             <form action="ModificarProducto.php" method="post">
             <button type="submit" class="btn btn-danger">
                <img src="../img/modificar.png" width="25px" height="25px">Modificar</button>
                <input type="hidden" name="modificar" value="<?php  echo  $rowProductos[$i]["cve_producto"]; ?>">

            </form></td>
    </tr>

    
      
      <?php } ?>
  </tbody>   
                    </div></table>
               <center> <div id="paginador"></div></center>
<script type="text/javascript">
var p = new Paginador(
    document.getElementById('paginador'),
    document.getElementById('tblDatos'),
    15
);
p.Mostrar();   
     </script>              
                 
                    </div></div></div>
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