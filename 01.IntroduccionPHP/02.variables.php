<?php 

#Variable numerica
$numero = 5;
echo "Esto es una variable numero: $numero<br>";
var_dump($numero);
echo "<br><br>";

#Variable texto
$palabra = "palabra";
echo "Esto es una variable texto: $palabra<br>";
var_dump($palabra);
echo "<br><br>";

#Variable Boleana
$boleana = true;
echo "Esto es una variable boleana: $boleana<br>";
var_dump($boleana);
echo "<br><br>";

#Variable Arreglo
$colores = array("rojo", "amarillo" );
echo "Esto es una variable arreglo: $colores[1]<br>";
var_dump($colores);
echo "<br><br>";

#Variable Arreglo con Propiedades
$verduras = array("verdura1" => "lechuga", "verdura2" => "cebolla");
echo "Esto es una variable arreglo con propiedades: $verduras[verdura1]<br>";
var_dump($verduras);
echo "<br><br>";

#Variable Objeto
$frutas = (object)["fruta1" => "pera", "fruta2" => "manzana", "fruta3" => "banana"];
echo "Esto es una variable Objeto: $frutas->fruta1<br>";
var_dump($frutas);
echo "<br><br>";






 ?>