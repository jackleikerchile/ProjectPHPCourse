<?php 


#Funciones sin Parametros
function saludo(){

	echo "hola<br>";


}
saludo();



#Funciones con parametros
function despedida($adios){

	echo $adios ."<br>";

}
despedida("chao");



#Funciones con Retorno
function retorno($retornar){
	
	return $retornar;
}

echo retorno("Retornar");





 ?>