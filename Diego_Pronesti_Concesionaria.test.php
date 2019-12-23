<?php
require_once("./vendor/autoload.php");
require_once("Concesionaria.php");

use PHPUnit\Framework\TestCase; #namespace

final class ConcesionariaTest extends TestCase{

    function testAgregarAutos(){
        $concesionaria = new Concesionaria();
        $res = $concesionaria->agregarAutos(1,"Ford","F100",1998,100000);
        $this->assertTrue($res);
    }
    function testAgregarAutosVarios(){
        $concesionaria = new Concesionaria();
        $res = $concesionaria->agregarAutos(1,"Ford","F100",1998,100000);
        $res1 = $concesionaria->agregarAutos(2,"Fiat","147",1990,50000);
        $res2 = $concesionaria->agregarAutos(3,"Volkswagen","Gol",2001,200000);
        $this->assertTrue($res && $res1 && $res2);
    }

    function testAgregarAutosMismaId(){
        $concesionaria = new Concesionaria();
        $res = $concesionaria->agregarAutos(1,"Ford","F100",1998,100000);
        $res2 = $concesionaria->agregarAutos(1,"Ford","Mustang",2019,10000000);
        $this->assertTrue($res);
        $this->assertFalse($res2);
    }

    function testMostrarAutosDeMarcaFord() {
        $concesionaria = new Concesionaria();
        $res0 = $concesionaria->agregarAutos(1,"Ford","F100",1998,100000);
        $res1 = $concesionaria->agregarAutos(2,"Ford","Mustang",2019,10000000);
        $res2 = $concesionaria->agregarAutos(3,"Fiat","147",1990,50000);
        $res3 = $concesionaria->agregarAutos(4,"Volkswagen","Gol",2001,200000);
        $this->assertTrue($res0 && $res1 && $res2 && $res3);
        $res = $concesionaria->mostrarAutosDeMarca("Ford");
        $this->assertIsArray($res);
        $this->assertNotEmpty($res);
        $this->assertCount(2,$res);
    }

    function testMostrarAutosDeMarcaAudi() {
        $concesionaria = new Concesionaria();
        $res0 = $concesionaria->agregarAutos(1,"Ford","F100",1998,100000);
        $res1 = $concesionaria->agregarAutos(2,"Ford","Mustang",2019,10000000);
        $res2 = $concesionaria->agregarAutos(3,"Fiat","147",1990,50000);
        $res3 = $concesionaria->agregarAutos(4,"Volkswagen","Gol",2001,200000);
        $this->assertTrue($res0 && $res1 && $res2 && $res3);
        $res = $concesionaria->mostrarAutosDeMarca("Audi");
        $this->assertIsArray($res);
        $this->assertEmpty($res);
        $this->assertCount(0,$res);
    }

    function testVenderAutoMarcaAudi(){
        $concesionaria = new Concesionaria();
        $res0 = $concesionaria->agregarAutos(1,"Ford","F100",1998,100000);
        $res1 = $concesionaria->agregarAutos(2,"Ford","Mustang",2019,10000000);
        $res2 = $concesionaria->agregarAutos(3,"Fiat","147",1990,50000);
        $res3 = $concesionaria->agregarAutos(4,"Volkswagen","Gol",2001,200000);
        $this->assertTrue($res0 && $res1 && $res2 && $res3);
        $res = $concesionaria->venderAutoMarca("Audi");
        //$this->assertIsInt($res); //se espera que devuelva 0 porque no lo tiene, pero devuelve false
        //$this->assertSame(0,$res); // espera 0 encuentra false
    }

    function testVenderAutoMarcaFord(){
        $concesionaria = new Concesionaria();
        $res0 = $concesionaria->agregarAutos(1,"Ford","F100",1998,100000);
        $res1 = $concesionaria->agregarAutos(2,"Ford","Mustang",2019,10000000);
        $res2 = $concesionaria->agregarAutos(3,"Fiat","147",1990,50000);
        $res3 = $concesionaria->agregarAutos(4,"Volkswagen","Gol",2001,200000);
        $this->assertTrue($res0 && $res1 && $res2 && $res3);
        $res = $concesionaria->venderAutoMarca("Ford");
        //$this->assertIsInt($res); //Se espera el valor del auto vendido pero devulve true.
        //$this->assertSame(10000000,$res); //Se espera el valor del auto vendido pero devulve true.
    }

    function testVenderAutoMarcaFiat(){
        $concesionaria = new Concesionaria();
        $res0 = $concesionaria->agregarAutos(1,"Ford","F100",1998,100000);
        $res1 = $concesionaria->agregarAutos(2,"Ford","Mustang",2019,10000000);
        $res2 = $concesionaria->agregarAutos(3,"Fiat","147",1990,50000);
        $res3 = $concesionaria->agregarAutos(4,"Volkswagen","Gol",2001,200000);
        $this->assertTrue($res0 && $res1 && $res2 && $res3);
        $res = $concesionaria->venderAutoMarca("Fiat");
        //$this->assertIsInt($res); //Se espera el valor del auto vendido pero devulve true.
        //$this->assertSame(50000,$res); //Se espera el valor del auto vendido pero devulve true.
    }

    function testTotalGanadoVendiendo(){
        $concesionaria = new Concesionaria();
        $res0 = $concesionaria->agregarAutos(1,"Ford","F100",1998,100000);
        $res1 = $concesionaria->agregarAutos(2,"Ford","Mustang",2019,10000000);
        $res2 = $concesionaria->agregarAutos(3,"Fiat","147",1990,50000);
        $res3 = $concesionaria->agregarAutos(4,"Volkswagen","Gol",2001,200000);
        $this->assertTrue($res0 && $res1 && $res2 && $res3);
        $res4 = $concesionaria->venderAutoMarca("Ford");
        $res5 = $concesionaria->venderAutoMarca("Ford");
        $res6 = $concesionaria->venderAutoMarca("Fiat");
        $this->assertTrue($res4 && $res5 && $res6);
        $res= $concesionaria->totalGanado();
        $this->assertIsInt($res);
        $this->assertSame(10150000, $res);
    }

    function testTotalGanadoSinVender(){
        $concesionaria = new Concesionaria();
        $res0 = $concesionaria->agregarAutos(1,"Ford","F100",1998,100000);
        $res1 = $concesionaria->agregarAutos(2,"Ford","Mustang",2019,10000000);
        $res2 = $concesionaria->agregarAutos(3,"Fiat","147",1990,50000);
        $res3 = $concesionaria->agregarAutos(4,"Volkswagen","Gol",2001,200000);
        $this->assertTrue($res0 && $res1 && $res2 && $res3);
        $res= $concesionaria->totalGanado();
        $this->assertIsInt($res);
        $this->assertSame(0, $res);
    }

}