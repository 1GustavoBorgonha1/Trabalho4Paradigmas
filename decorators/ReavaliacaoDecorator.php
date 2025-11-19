<?php

require_once "DepreciacaoDecorator.php";

class ReavaliacaoDecorator extends DepreciacaoDecorator {

    public function calcular(float $valor, int $vidaUtil, int $ano): float {
        $base = $this->wrappee->calcular($valor, $vidaUtil, $ano);
        return $base * 1.10; // exemplo: revalorização +10%
    }
}
