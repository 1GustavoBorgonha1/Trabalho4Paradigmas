<?php

function assertEquals($expected, $actual, $message = "") {
    if (abs($expected - $actual) > 0.00001) {
        echo "❌ ERRO: $message\n  Esperado: $expected\n  Recebido: $actual\n\n";
        return;
    }
    echo "✔ SUCESSO: $message\n";
}

function assertTrue($condition, $message = "") {
    if (!$condition) {
        echo "❌ ERRO: $message\n";
        return;
    }
    echo "✔ SUCESSO: $message\n";
}

echo "=== Rodando Testes ===\n\n";

require_once "StrategyTest.php";
require_once "DecoratorTest.php";
require_once "FactoryTest.php";

echo "\n=== Fim dos testes ===\n";
