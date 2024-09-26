<?php
 
try {
    // Código que gera exceção no PHP 8
    $total = 2 / 0;
} catch (DivisionByZeroError $e) {
    echo json_encode(array(
        'code' => $e->getCode(),
        'message' => $e->getMessage(),
        'file' => $e->getFile(),
        'line' => $e->getLine()
    ));
} catch (Error $e) {
    // Captura outras exceções genéricas
    echo json_encode(array(
        'code' => $e->getCode(),
        'message' => $e->getMessage(),
        'file' => $e->getFile(),
        'line' => $e->getLine()
    ));
}


?>