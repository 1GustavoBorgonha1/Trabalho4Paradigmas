<?php

require_once __DIR__ . "/../strategies/DepreciacaoStrategy.php";

abstract class DepreciacaoDecorator implements DepreciacaoStrategy {
    protected DepreciacaoStrategy $wrappee;

    public function __construct(DepreciacaoStrategy $wrappee) {
        $this->wrappee = $wrappee;
    }
}