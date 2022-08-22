<?php 
    require "../utils/autoload.php";

    class Modelo{
        public $IpBaseDeDatos;
        public $NombreBaseDeDatos;
        public $UsuarioBaseDeDatos;
        public $PasswordBaseDeDatos;
        public $conexionBaseDeDatos;
        
        public function __construct(){
            $this -> inicializarParametrosDeConexion();

            $this -> conexionBaseDeDatos = new mysqli(
                $this -> IpBaseDeDatos,
                $this -> UsuarioBaseDeDatos,
                $this -> PasswordBaseDeDatos,
                $this -> NombreBaseDeDatos
            );
            if ($this -> conexionBaseDeDatos -> connect_error) {
                throw new Exception('NoSePudoConectar');
            }


        }

        private function inicializarParametrosDeConexion(){
            $this -> IpBaseDeDatos = IP_DB;
            $this -> NombreBaseDeDatos = NAME_DB;
            $this -> UsuarioBaseDeDatos = USER_DB;
            $this -> PasswordBaseDeDatos = PASS_DB;
        }

    }