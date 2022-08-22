<?php 
    require "../utils/autoload.php";

    class PersonaModelo extends Modelo {
        public $id;
        public $nombre;
        public $apellido;
        public $telefono;
        public $email;

        public function __construct($id=""){
            parent::__construct();
            if($id !== "") {
                $this -> id = $id;
                $this -> Obtener();
            }
        }
        public function Guardar(){
            if($this -> id === NULL) $this -> insertar();
            else $this -> modificar();
        }

        public function Obtener(){
            $sql = "SELECT * FROM personita WHERE id = " . $this -> id;
            $fila = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> id = $fila['id'];
            $this -> nombre = $fila['nombre'];
            $this -> apellido = $fila['apellido'];
            $this -> telefono = $fila['telefono'];
            $this -> email = $fila['email'];

        }

        public function Eliminar(){
            $sql = "DELETE FROM personita WHERE id = " . $this -> id;
            $this -> conexionBaseDeDatos -> query($sql);
        }

        private function insertar(){
            $sql = "INSERT INTO personita (nombre,apellido,telefono,email) VALUES (
                '" . $this -> nombre . "',
                '" . $this -> apellido . "', 
                '" . $this -> telefono . "',
                '" . $this -> email . "'
            )";
            $this -> conexionBaseDeDatos -> query($sql);

            if($this -> conexionBaseDeDatos -> errorno != 0)
                throw new mysqli_sql_exception($sql, $this->conexionBaseDeDatos->error, $this->conexionBaseDeDatos->errorno);
        }

        private function modificar(){
            $sql = "UPDATE personita SET 
                    nombre = '" . $this -> nombre . "',
                    apellido = '" . $this -> apellido . "', 
                    telefono = " . $this -> telefono . ",
                    email = " . $this -> email . "
                    WHERE id = " . $this -> id;
            $this -> conexionBaseDeDatos -> query($sql);
        }

        public function ObtenerTodos(){
            $sql = "SELECT * FROM personita";
            $filas = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC);
            echo $num_rows;die();
            if($filas -> num_rows == 0){
                throw new Exception("No hay personas en la tabla");
            }
            $elementos = [];
            foreach($filas as $fila){
                $p = new PersonaModelo();
                $p -> id = $fila['id'];
                $p -> nombre = $fila['nombre'];
                $p -> apellido = $fila['apellido'];
                $p -> telefono = $fila['telefono'];
                $p -> email = $fila['email'];

                array_push($elementos,$p);
            }
            
            return $elementos;
        }        
    }