<?php
require_once "DepreciacaoStrategy.php";

class SomaDigitosStrategy implements DepreciacaoStrategy {
    public function calcular(float $valor, int $vidaUtil, int $ano): float {
        $soma = ($vidaUtil * ($vidaUtil + 1)) / 2;
        $peso = $vidaUtil - $ano + 1;
        return $valor * ($peso / $soma);
    }
}
