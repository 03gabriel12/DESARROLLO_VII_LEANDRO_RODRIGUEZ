<?php
include "./utilidades_texto.php";
$array_frases = ["Hola Mundo", "soy un programador", "tengo mucha Hambre hoy "];
?>
<div>
    <p>Las frases del array son </p>
    <?php foreach ($array_frases as $data) {
        $cont_palabras = contar_palabras($data);
        $cont_vocales = contar_vocales($data);
        $inv_palabras = invertir_palabras($data);
        echo "
        <span>
         frase :  $data 
        <br>
        cantidad de palabras: $cont_palabras
        <br>
        cant de vocales : $cont_vocales
        <br>
        palabras invertidad : $inv_palabras
        </span>
        <br>
        <br>";
    }
    ?>

</div>