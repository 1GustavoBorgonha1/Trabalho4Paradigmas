<?php
class Config {
    private static ?Config $instancia = null;
    public array $settings = [];

    private function __construct() {}

    public static function getInstance(): Config {
        if (self::$instancia === null) {
            self::$instancia = new Config();
        }
        return self::$instancia;
    }
}
