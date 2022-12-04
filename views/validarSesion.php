
  
 <?php
	if(!empty($_POST)){
        
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        $usu=null;
        $pass=null;
        $tipousuario;
        require ("../libs/AccesoDatos.php"); 
        require("../models/Usuarios.php");   

        $objadmin= new Usuarios();
        $rowUsuario=$objadmin->logeo($usuario,$password);
        
        for ($i=0; $i<count($rowUsuario); $i++){
              $usu=$rowUsuario[$i]["nombre_usuario"];
             $pass=$rowUsuario[$i]["password"]; 
        
       echo $tipousuario=$rowUsuario[$i]["tipo_usuario"];
        }
        
        if($usu!=null&&$pass!=null){
        
        
				
		echo "Bienvenido ".$usuario;
				@session_start();
				$_SESSION["usuario"]=$usuario;
				
            if($tipousuario=="Administrador"){
				header("Location:Administrador.php");
                
            }else if($tipousuario=="Vendedor"){
				header("Location:vendedor.php");
                
            }else if($tipousuario=="Cliente"){
				header("Location:cliente.php");
            }
            else if($tipousuario=="Secretaria"){
				header("Location:Secretaria.php");
            }
        
        }else{
            
		$mensaje = "Usuario o Password Incorrecto";
echo "<script>";
echo "alert('$mensaje');";  
echo "window.location = 'login.php';";
echo "</script>"; 
        }
    
        
    }else{
        header('Location: ../../index.php');
    }
     ?>
        
       
