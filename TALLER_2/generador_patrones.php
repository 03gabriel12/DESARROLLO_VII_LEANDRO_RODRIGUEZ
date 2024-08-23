<?php

echo "<br>";
echo "Crea un patrón de triángulo rectángulo usando asteriscos (*) con un bucle for. El triángulo debe tener 5 filas.";


for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "<br>";
}

echo "<br>";

echo "Utilizando un bucle while, genera una secuencia de números del 1 al 20, pero solo muestra los números impares.";
echo "<br>";
$i = 1;
while ($i <= 20) {
    if ($i % 2 != 0) {
        echo $i . " ";
    }
    $i++;
}



echo "<br>";
echo "<br>";
echo "Con un bucle do-while, crea un contador regresivo desde 10 hasta 1, pero salta el número 5.";
echo "<br>";
$i = 10;
do {
    if ($i != 5) {
        echo $i . " ";
    }
    $i--;
} while ($i >= 1);

?>