<?php
function sanitizarVariable($var) {
    return filter_var(trim($var), FILTER_SANITIZE_STRING);
}
?>