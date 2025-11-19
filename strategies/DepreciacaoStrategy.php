<?php
interface DepreciacaoStrategy {
    public function calcular(float $valor, int $vidaUtil, int $ano): float;
}