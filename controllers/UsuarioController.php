<?php
    use  Models\Usuario;
    include 'models/Usuario.php';
    include 'models/administradorUsuario.php';
    include 'models/AccesoDatos.php';

    class UsuarioController {

        public function inicio() {
           require_once 'views/usuario/inicio.php';
        }

        public function catalogos(){
            $usuario = new Usuario();
            $usuario = $usuario->catalogos();
            return $usuario;
        }

        function loginAdm (){
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $usuario = new Usuario();
            $usuario = $usuario->loginAdmin($usuario,$password);
            if($usuario){
                require_once 'views/usuario/Administrador.php';
            }else{
                require_once 'views/usuario/inicio.php';
            }
        }

        public function index() {
            $usuario = new Usuario();
            $usuarios = $usuario->all();
            return $usuarios;
        }

        public function categoria($id) {
            $usuario = new Usuario();
            $usuario = $usuario->find($id);
            return $usuario;
        }

        public function login($usuario,$password) {
            $usuario = new Usuario();
            $usuario = $usuario->login($usuario,$password);
            return $usuario;
        }

        public function store($usuario,$password,$nombre,$apellido,$email,$telefono,$direccion,$id_rol) {
            $usuario = new Usuario();
            $usuario = $usuario->store($usuario,$password,$nombre,$apellido,$email,$telefono,$direccion,$id_rol);
            return $usuario;
        }

        public function update($id,$usuario,$password,$nombre,$apellido,$email,$telefono,$direccion,$id_rol) {
            $usuario = new Usuario();
            $usuario = $usuario->update($id,$usuario,$password,$nombre,$apellido,$email,$telefono,$direccion,$id_rol);
            return $usuario;
        }

        public function destroy($id) {
            $usuario = new Usuario();
            $usuario = $usuario->destroy($id);
            return $usuario;
        }

        function buscarProducto (){
            $id = $_POST['id'];
            $usuario = new Usuario();
            $usuario = $usuario->find($id);
            if($usuario){
                require_once 'views/usuario/ModificarProducto.php';
            }else{
                require_once 'views/usuario/index.php';
            }
        }

        public function get_id($usuario,$password){
            $usuario = new Usuario();
            $usuario = $usuario->get_id($usuario,$password);
            return $usuario;
        }

        public function get_productos($id_usuario){
            $usuario = new Usuario();
            $usuario = $usuario->get_productos($id_usuario);
            return $usuario;
        }

        public function get_productos_categoria($id_usuario,$id_categoria){
            $usuario = new Usuario();
            $usuario = $usuario->get_productos_categoria($id_usuario,$id_categoria);
            return $usuario;
        }

        public function loginAdmin($usuario,$password){
            $usuario = new Usuario();
            $usuario = $usuario->loginAdmin($usuario,$password);
            return $usuario;
        }

        public function __construct() {
            $this->usuario = new Usuario();
            $this->administradorUsuario = new AdministradorUsuario();
        }

        public function all() {
            $usuarios = $this->usuario->all();
            return $usuarios;
        }
    }

?>