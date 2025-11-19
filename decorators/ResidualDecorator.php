<?php

require_once "DepreciacaoDecorator.php";

class ResidualDecorator extends DepreciacaoDecorator {

    public function calcular(float $valor, int $vidaUtil, int $ano): float {
        $base = $this->wrappee->calcular($valor, $vidaUtil, $ano);
        return max(0, $base - 100); // exemplo: sempre desconta 100
    }
}
