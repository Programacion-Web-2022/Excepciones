<?php 
    require "../utils/autoload.php";

    class PersonaControlador{
        public static function Alta($context){
            $p = new PersonaModelo();
            $p -> nombre = $context['post']['nombre'];
            $p -> apellido = $context['post']['apellido'];
            $p -> telefono = $context['post']['telefono'];
            $p -> email = $context['post']['email'];

            try{
                $p -> Guardar();
                render("altaDePersona",["exito" => true]);
            }

            catch(mysqli_sql_exception $e){
                if($e -> getCode() == 1366)
                    render("altaDePersona",[
                        "error" => "Pone un telefono enter, gil",
                        "telefonoInvalido" => true]
                    );
                if($e -> getCode() == 1062)
                    render("altaDePersona",[
                        "error" => "Correo afanado",
                        "correoRepetido" => true]
                    );   
                
            }
        
        }


        public static function Listar(){
            try {
                $p = new PersonaModelo();
                $personitas = $p -> ObtenerTodos();

                $resultado = [];
                foreach($personitas as $persona){
                    $t = [
                        'id' => $persona -> id,
                        'nombre' => $persona -> nombre,
                        'apellido' => $persona -> apellido,
                        'telefono' => $persona -> telefono,
                        'email' => $persona -> email,
                    ];
                    
                    array_push($resultado,$t);
                }
                render("listarPersonas",["personas" => $resultado]);
            }    
            catch(Exception $e){
                render("listarPersonas",["vacio" => true]);
            }   
        }
    }