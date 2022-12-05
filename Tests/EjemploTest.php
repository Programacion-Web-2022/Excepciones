<?php 
require_once "../utils/autoload.php";

use PHPUnit\Framework\TestCase;

final class EjemploTest extends TestCase
{
    public function testAssertion(): void
    {
        $numero = 10;
        $this->assertSame(10, $numero);

    }

    public function testAssertion2(): void
    {
        $numero = 11;
        $this->assertSame(10, $numero);

    }
}