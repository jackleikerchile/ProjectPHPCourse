<?php 

#Condiciones
$a = 5;
$b = 10;

if ($a > $b) {
	echo "a es mayor que b";
}

elseif ($a == $b) {
	echo "a es igual que b";
}

else {
	echo "a es menor que b";
}



echo "<br><br>";


#Suiches
$dia = "Martes";

switch ($dia) {
	case 'Sabado':
		echo "Voy a estudiar php";
	break;


	case 'Domingo':
		echo "Voy a descansar";
	break;
	

	case 'Viernes':
		echo "Voy a la fiesta";
	break;
	
	default:
		echo "Voy a la universidad";
	break;
}


echo "<br><br>";


#Ciclo While
$n = 1;

while ($n <= 5) {

	echo $n;
	$n++;
}



echo "<br><br>";



#Ciclo Do While
$p = 1;

do {

	echo $p;
	$p++;

}while ($p <= 10);


echo "<br><br>";



#Ciclo For
for ($i=0; $i<=5; $i++) { 

	echo $i;
}





?>