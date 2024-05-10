<?php
session_start();
if (!isset($_SESSION['history'])) {
    $_SESSION['history'] = array();
}

if (isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['operation'])) {
    $num1 = (float)$_POST['num1'];
    $num2 = (float)$_POST['num2'];
    $operation = $_POST['operation'];
    $result = 0;

    switch ($operation) {
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '*':
            $result = $num1 * $num2;
            break;
        case '/':
            $result = $num1 / $num2;
            break;
        default:
            $result = 'Operacao invalida';
            break;
    }

    $expression = "$num1 $operation $num2 = $result";
    array_unshift($_SESSION['history'], $expression); 
    
    $_SESSION['history'] = array_slice($_SESSION['history'], 0, 5); // Mantém apenas os últimos 5 cálculos
}

if (isset($_POST['clear_history'])) {
    $_SESSION['history'] = array(); // Limpa o histórico
}





