<?php
require_once __DIR__ . "/../factory/DepreciacaoFactory.php";

echo "== Teste Factory ==\n";

$equip = DepreciacaoFactory::criar("equipamento");
assertTrue(
    $equip instanceof LinearStrategy,
    "Factory retorna LinearStrategy para equipamento"
);
