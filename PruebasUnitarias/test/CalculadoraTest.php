<?php

use PHPUnit\Framework\TestCase;
require_once '../Calculadora.php';

/**
 * Description of CalculadoraTest
 *
 * @author zero
 */
class CalculadoraTest extends TestCase {
    
    public function testSumar() {
        $this->assertEquals(6, Calculadora::sumar(2, 4));
        $this->assertEquals(10, Calculadora::sumar(5, 5));
    }
    
    public function testRestar() {
        $this->assertEquals(10, Calculadora::restar(22, 12));
        $this->assertEquals(15, Calculadora::restar(16, 1));
    }
    
}
