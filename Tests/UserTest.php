<?php 
require_once "../utils/autoload.php";

use PHPUnit\Framework\TestCase;


function randomString($length){
    return substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
}


final class UserTest extends TestCase
{
    public function testIniciarSesionCorrecto(): void
    {
        $context = [
            'post' => [
                'usuario' => "josesito",
                'password' => "1234"
            ]
        ];


        $this -> assertTrue(SesionControlador::Autenticar($context));
    }

    public function testIniciarSesionIncorrecto(): void
    {
        $context = [
            'post' => [
                'usuario' => "qweqweqweqweqw",
                'password' => "1234"
            ]
        ];
        $this -> assertFalse(SesionControlador::Autenticar($context));
    }

    public function testCrearUsuario(): void
    {
        $context = [
            'post' => [
                'usuario' => randomString(10),
                'password' => randomString(10)
            ]
        ];
        UsuarioControlador::Alta($context);

        $this -> assertTrue(SesionControlador::Autenticar($context));

    }

}