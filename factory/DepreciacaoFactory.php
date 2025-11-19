<?php

require_once __DIR__ . "/../strategies/LinearStrategy.php";
require_once __DIR__ . "/../strategies/SomaDigitosStrategy.php";

class DepreciacaoFactory {

    public static function criar(string $tipoAtivo): DepreciacaoStrategy {
        return match ($tipoAtivo) {
            "equipamento" => new LinearStrategy(),
            "veiculo" => new SomaDigitosStrategy(),
            default => new LinearStrategy()
        };
    }
}
