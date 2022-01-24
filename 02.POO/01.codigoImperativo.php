<?php 
#Codigo Imperativo o Espagueti

$automovil1 = (object)["Marca" => "Toyota", "Modelo" => "Corolla"];
$automovil2 = (object)["Marca" => "Hyunday", "Modelo" => "Accent Vision"];


function mostrar($automovil){

	echo "<p>Hola les voy a mostrar un auto $automovil->Marca, Modelo $automovil->Modelo</p>";

}
mostrar($automovil1);
mostrar($automovil2);







 ?>