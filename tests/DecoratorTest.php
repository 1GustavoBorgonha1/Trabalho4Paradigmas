<?php
require_once __DIR__ . "/../decorators/ResidualDecorator.php";
require_once __DIR__ . "/../decorators/ReavaliacaoDecorator.php";
require_once __DIR__ . "/../strategies/LinearStrategy.php";

echo "== Teste Decorator ==\n";

$base = new LinearStrategy();
$residual = new ResidualDecorator($base);

assertEquals(
    0,
    $residual->calcular(500, 5, 1),
    "ResidualDecorator reduz corretamente"
);

$reav = new ReavaliacaoDecorator($base);
$result2 = $reav->calcular(1000, 10, 1);

assertEquals(
    110,
    $result2,
    "ReavaliacaoDecorator adiciona 10%"
);
