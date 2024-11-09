<?php

function calcular_descuento($total_compra)
{
    if ($total_compra < 100) {
        return 0;
    } else if ($total_compra < 100 and $total_compra > 500) {
        return $total_compra * .5;
    } else if ($total_compra < 501 and $total_compra > 1000) {
        return $total_compra * .10;
    } else if ($total_compra < 1000) {
        return $total_compra * .15;
    }
}
function aplicar_impuesto($subtotal)
{
    return $subtotal * 0.7;
}
function calcular_total($subtotal,$descuento,$impuesto){
    return ($subtotal-$descuento+$impuesto);
}
?>