<?php 
    require "../utils/autoload.php";

    class SesionControlador {
        public static function Autenticar($context){
            $u = new UsuarioModelo();
            $u -> Nombre = $context['post']['usuario'];
            $u -> Password = $context['post']['password'];
            if($u -> Autenticar($u -> Nombre, $u -> Password))
                return true; 
            return false;

        }
        public static function IniciarSesion($context){

            try {
                if(self::Autenticar($context)){
                    SessionCreate("autenticado",true);
                    SessionCreate("nombreUsuario", $u -> Nombre);
                    header("Location: /");
                }
                render("login",["error" => true]);
            }
            catch (Exception $e) {
                render("login",["errorConexion" => true]);
            }
            
        }

        public static function CerrarSesion($context){
            session_destroy();
            header("Location:/login");
        }

       
    }

