<?php
require_once "DepreciacaoStrategy.php";

class LinearStrategy implements DepreciacaoStrategy {
    public function calcular(float $valor, int $vidaUtil, int $ano): float {
        return $valor / $vidaUtil;
    }
}
