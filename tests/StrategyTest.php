<?php
require_once __DIR__ . "/../strategies/LinearStrategy.php";
require_once __DIR__ . "/../strategies/SomaDigitosStrategy.php";

echo "== Teste Strategy ==\n";

$linear = new LinearStrategy();
$result = $linear->calcular(1000, 10, 1);
assertEquals(100, $result, "LinearStrategy calcula 100 por ano");

$soma = new SomaDigitosStrategy();
$valor = $soma->calcular(1000, 10, 1);
assertTrue($valor > 0, "SomaDigitosStrategy retorna valor positivo");
