<?php

class Ativo {

    public function __construct(
        public string $nome,
        public float $valor,
        public int $vidaUtil,
        public string $tipo
    ) {}

    public function simular(DepreciacaoStrategy $estrategia): array {
        $valores = [];
        for ($ano = 1; $ano <= $this->vidaUtil; $ano++) {
            $valores[$ano] = $estrategia->calcular($this->valor, $this->vidaUtil, $ano);
        }
        return $valores;
    }
}
