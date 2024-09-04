<?php
include_once "./funciones_tienda.php";
$carrito = [
    'camisa' => 2,
    'pantalon' => 1,
    'zapatos' => 1,
    'calcetines' => 3,
    'gorra' => 0
];

$subtotal = 0;
$impuesto = 0;
$descuento_aplicado = 0;
$total_compra = 0;
echo " 
<h3> Lista de producto </h3>
<br>
producto  precio
<br>
";
foreach ($carrito as $array => $key) {
    $subtotal += $key;
    $descuento_aplicado=calcular_descuento($subtotal);
    $impuesto = aplicar_impuesto($subtotal);
    $total_compra=calcular_total($subtotal,$descuento_aplicado,$impuesto);
    echo " 
        $array | $key <br>
    ";
}

echo "
<br><br>
subtotal de la compra  $subtotal
<br>
descuento aplicado $descuento_aplicado
<br>
impuesto $impuesto
<br>
total de la compra $total_compra
";
