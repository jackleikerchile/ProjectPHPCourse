<?php 
#CLASE
#Una clase es un modelo que se utiliza para crear objetos que comparten un mismo comportamiento, estado e identidad.


class Automovil {                     #### PRIMER ENCAPSULACION LOGICA QUE ES LA CLASE ###

	#PROPIEDADES:
	#Son las caracteristicas que pueden tener un objeto

	public $marca;
	public $modelo;

	#METODO
	#Es un algoritmo asociado a un objeto que indica la capacidad de lo que este puede hacer. La unica diferencia entre metodo y funcion, es que llamamos metodos a las funciones de una clase (en la POO), mientras que llamamos funciones, a los algoritmos de la programacion estructurada.

	public function mostrar(){

		echo "<p>Hola les voy a mostrar un $this->marca, modelo $this->modelo</p>";


	}


}
#Declarar OBJETO
#Una entidad provista de metodos o mensajes a los cuales responde propiedades con valores concretos
$a = new Automovil();              ### SEGUNDA ENCAPSULACION LOGICA QUE ES EL OBJETO ###
$a -> marca = "Toyota";
$a -> modelo = "Corolla";
$a -> mostrar();

$b = new Automovil();
$b -> marca = "Hyundai";
$b -> modelo = "Accent Vision";
$b -> mostrar();

$b = new Automovil();
$b -> marca = "Mazda"; #ABSTRACCION: Nuevos tipos de datos (el que tu quieras, tu lo creas)
$b -> modelo = "6";    #OCULTAMIENTO: NOSTROS NECESITAMOS MOSTRAR LOS VALORES DE LAS PROPIEDADES MARCA Y MODELO
$b -> mostrar();


#Principios de la POO que se cumple en este ejemplo:

#ABSTRACCION: Nuevos tipos de datos (el que tu quieras, tu lo creas)
#ENCAPSULACION: Organizar el codigo en grupos logicos.
#OCULTAMIENTO: Ocultar detalles de implementacion y exponer solo los detalles que sean necesarios para el resto del sitema.


 ?>