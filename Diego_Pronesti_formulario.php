<?php
/**
 * =====================================
 * 1 - Cuanto vale $a en los tres casos:
 * =====================================
 */

//a
$a = 10;
function ej1_a() {
  $a = 11;
}
ej1_a();
//cuanto vale a? 
//$a vale 10

//b
$b = 10;
function ej1_b() {
  global $b;
  $b = 11;
}
ej1_b();
//cuanto vale b?
//$b vale 11

//c
$c = 10;
function ej1_c() {
  $c = 11;
  global $c;
}
ej1_c();
//cuanto vale c?
//$c vale 10

//d
$d = 10;
function ej1_d() {
  global $d;
  $d = 11;
}
//cuanto vale d?
//$d vale 10

//e
$e = 11;
function ej1_e1() {
  ej1_e2();
  $e = 12;
}
function ej1_e2() {
  global $e;
}
ej1_e1();
//cuanto vale $e?
//$d vale 11

//f
for($i=0;$i<2;$i++) {
}
echo $i;
// cuanto vale i?
//$i vale 2

//g
// Si dentro de una función queremos acceder
// al valor de una variable que esta fuera, como
// debermos hacerlo? Que diferencia tiene con el
// uso de global?

/* Para acceder a un valor de una variable externa debemos ingresarla como argumento de la funcion. 
La diferencia con global es que en php cuando se ingresa por parametro se utiliza una copia de la variable 
y cuando utilizamos global estamos haciendo referencia a la misma variable.
*/



/**
 * =====================================
 * 2 - imprimir secuencias con bucles
 * =====================================
 */
//a - Escribir un bucle for y un while donde se
//    imprimen solo los valores impares desde 20 a 0
//    Es decir, 19, 17, 15, 13
print("\n Ejercicio 2-A: \n");
for($i=19;$i>0;$i=$i-2){
    print($i);
}
print("\n");
$i=19;
while($i > 0){
    print($i);
    $i = $i - 2;
}


//b - Igual al punto a pero en orden inverso salteando de a uno
//    (imprime la mitad de numeros)
print("\n Ejercicio 2-B: \n");
for($i=1;$i<20;$i=$i+4){
    print($i);
}
print("\n");
$i=1;
while($i < 20){
    print($i);
    $i = $i + 4;
}

//c - Crear un arreglo de 10 elementos y recorrerlo
//    con un foreach en ambos sentidos
//    (hint: puede usar funciones de array antes de entrar al foreach)
print("\n Ejercicio 2-C: \n");
$array = array(1,2,3,4,5,6,7,8,9,10);

foreach($array as $i => $v_i){
    print($v_i);
}
print("\n");
foreach(array_reverse($array) as $j => $v_j){
    print($v_j);
}

//d - Crear un arreglo de 10 elementos y recorrerlo de ambos sentidos
//    con un for y un while
print("\n Ejercicio 2-D: \n");
$array = array(1,2,3,4,5,6,7,8,9,10);

for($i=0;$i<count($array);$i=$i+1){
    print($array[$i]);
}
print("\n");
for($i=count($array)-1;$i>=0;$i=$i-1){
    print($array[$i]);
}
print("\n");
$i = 0;
while($i<count($array)){
    print($array[$i]);
    $i = $i + 1;
}
print("\n");
$i = count($array)-1;
while($i>=0){
    print($array[$i]);
    $i = $i - 1;
}

/**
 * =====================================
 * 3 - Arreglos
 * =====================================
 */
//a - Crear un arreglo de una dimensión de mil elementos
//    con claves consecutivas
print("\n Ejercicio 3-A: \n");
$arregloA = range(0,1000);
print_r($arregloA);
//b - Crea un arreglo de 100elementos con claves numericas pero pares
//    Ej: $a[0], $a[2], $a[3] deben existir, $a[1], $a[3] no deben existir
print("\n Ejercicio 3-B: \n");
$arregloB = array_combine(range(0,198,2), range(1,100));
print_r($arregloB);

//c - Si nos pasan un arreglo y no sabemos el contenido, cual suele ser la mejor
//    forma de recorrerlo? Se puede de más formas?
print("\n Ejercicio 3-C: \n");
/* La mejor forma de recorrer un arreglo en php es foreach debido a que los indices pueden ser
no consecutivos o directamente cadenas de texto /*
/* Otra forma de recorrerlo puede ser esta: */

$arregloC = array("hola"=>"que tal", "todo"=>"viento", 3=>4 , 5=>"si");
$lista = array_keys($arregloC);
for($i=0;$i<count($lista);$i = $i + 1){
  print($arregloC[$lista[$i]]);
  print("\n");
}

//d - Crear una matriz de 10x10
print("\n Ejercicio 3-D: \n");
$matrizD = array();
$filas = 10;
$columnas = 10;
foreach(range(0,$filas-1) as $i => $v_i){
  $matrizD[$i] = array();
  foreach(range(0,$columnas-1) as $j => $v_j){
    $matrizD[$i][] = 0;
  }
}
print_r($matrizD);

//e - Podemos crear un "cubo" de 10x10x10 en lugar de una matriz? Crearlo con for o while
print("\n Ejercicio 3-E: \n");
$matriz3D = array();
$filas = 10;
$columnas = 10;
$profundidad = 10;

for($i=0;$i<$filas;$i = $i + 1){
  $matriz3D[$i]=array();
  for($j=0;$j<$columnas;$j = $j + 1){
    $matriz3D[$i][$j]=array();
    for($k=0;$k<$profundidad;$k = $k + 1){
      $matriz3D[$i][$j][$k]=0;
    }
  }
}

print_r($matriz3D);
 
/**
 * =====================================
 * 4 - funciones
 * =====================================
 */
//a - Crear una funcion que dado un arreglo/array duplica todos los valores
print("\n Ejercicio 4-A: \n");
function ej4_a(&$arreglo){
  foreach($arreglo as $k => $v){
    $arreglo[$k] = $v * 2; 
  }
}
$ar = array(1, 2, 3);
ej4_a($ar); // tiene que ---> modificar <---- todos los valores y duplicarlos
print_r($ar);

//b - Crea una funcion que dado un arreglo/array te devuelve un nuevo arreglo
//    con los valores duplicados pero no modifica el original (debe crear un
//    nuevo arreglo)
print("\n Ejercicio 4-B: \n");
function createNewArray($arrayFrom,&$arrayTo){
  foreach($arrayFrom as $k => $v){
    $arrayTo[$k] = $v * 2;
  }
}
$ar = array(1, 2, 3);
$newArray = array();
createNewArray($ar, $newArray);
print_r($newArray);

//c - De un ejemplo de función recursiva
print("\n Ejercicio 4-C: \n");
function cuenta_regresiva($desde){
  print($desde . "! \n");
  if($desde > 0){
    $desde = $desde - 1;
    cuenta_regresiva($desde);
  }
}

cuenta_regresiva(5);


//d - En este psuedo codigo, puede decirme si anda si lo programaramos en PHP?
//    Que devuelve? Que estamos calculando?
print("\n Ejercicio 4-C: \n");
/*
f1( $var1 ) {
  if $var1 > 1{
    return $var1 * f2($var1 - 1)
  }
  return $var1
}
f2( $var2 ) {
  if $var2 > 1{
    return $var2 * f1($var2 - 1)
  }
  return $var2
}
f1(5) // cuanto devuelve?
      // que esta calculando?
*/

function f1($var1){
  if($var1 > 1){
    return $var1 * f2($var1 - 1);
  }
  return $var1;
}

function f2($var2){
  if($var2 > 1){
    return $var2 * f1($var2 - 1);
  }
  return $var2;
}

print(f1(5));

/* Esta calculando el factorial de 5, por ende devuelve 120 */


/**
 * =====================================
 * 5 - A desarrollar
 * =====================================
 */
//a - Arregle el siguiente codigo
print("\n Ejercicio 5-A: \n");
$a = array(1,2,3);
$b = array(4,5,6);
echo "Las keys del arreglo a son: \n";
foreach ($a as $k => $v) {
  echo $k . "\n";
}
echo "\n\n";
// duplico todos los elementos sin agregar nuevos
print("\n Ejercicio 5-B: \n");
foreach ($b as $k => $v) {
  $b[$k] = $v*2;
}
print_r($b);
/**
 *
 * Teorico - Explicar TDD, dar un ejemplo de porque es util
 *           y nombrar todas las ventajas que le vean
 *
 */

 /*
 TDD: Test Driven Development es una manera de desarrollar codigo en la cual se empieza escribiendo los
 test de sus funciones para luego poder programarlas. Es util por que para cuando llegue el momento de escribir
 codigo vos ya vas a tener que funciones queres programar, que datos vas esperar que reciban y devuelvan
 y que comportamientos deberian tener entre ellas.
 La ventaja que le encuentro yo es que evita que tengamos que rehacer una funcion, porque no termina haciendo
 lo que necesitamos.
 */

?>