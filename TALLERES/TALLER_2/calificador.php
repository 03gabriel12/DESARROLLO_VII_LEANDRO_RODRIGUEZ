<?php


function menssage($nota)
{
    return  "<br> Tu calificacion es $nota";
}


echo " <h2>Nota de Calificacion</h2> ";
$calificacion = 80;
$nota_final;
if ($calificacion >= 90) {
    $nota_final = "A";
    echo menssage($nota_final);
} else if ($calificacion >= 80 and $calificacion <= 89) {
    $nota_final = "B";
    echo menssage($nota_final);
} else if ($calificacion >= 70 and $calificacion <= 79) {
    $nota_final = "C";
    echo menssage($nota_final);
} else if ($calificacion >= 60 and $calificacion <= 69) {
    $nota_final = "D";
    echo menssage($nota_final);
} else {
    $nota_final = "F";
    echo menssage($nota_final);
}


$status_nota_estudiante = ($nota_final == "A" or $nota_final == "B" or $nota_final == "C" or  $nota_final == "D") ? "Aprobado" : "Reprobado";
echo "<br>";
echo $status_nota_estudiante;

switch ($nota_final) {
    case "A":
        echo " <br> Excelente trabajo";
        break;
    case "B":
        echo "  <br> Buen trabajo";
        break;
    case "C":
        echo "  <br> Trabajo aceptable";
        break;
    case "D":
        echo "  <br> Necesitas mejorar";
        break;
    default:
        echo " <br> Debes esforzarte más ";
}
