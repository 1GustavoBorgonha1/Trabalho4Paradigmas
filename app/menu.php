<?php

require_once __DIR__ . "/../domain/Ativo.php";
require_once __DIR__ . "/../factory/DepreciacaoFactory.php";
require_once __DIR__ . "/../decorators/ResidualDecorator.php";
require_once __DIR__ . "/../decorators/ReavaliacaoDecorator.php";

echo "=== Sistema de Depreciação ===\n";
echo "Desenvolvido por: Gustavo Borgonha\n\n";

$nome = readline("Nome do ativo: ");
$valor = readline("Valor do ativo: ");
$vida = readline("Vida útil: ");
$tipo = readline("Tipo (equipamento/veiculo): ");

$ativo = new Ativo($nome, $valor, $vida, $tipo);

$strategy = DepreciacaoFactory::criar($tipo);

echo "Aplicar ajuste residual? (s/n): ";
if (trim(readline()) === "s") {
    $strategy = new ResidualDecorator($strategy);
}

echo "Aplicar reavaliação? (s/n): ";
if (trim(readline()) === "s") {
    $strategy = new ReavaliacaoDecorator($strategy);
}

$result = $ativo->simular($strategy);

print_r($result);
