<?php

require_once("views/header.php");

$index = new Index();

class Index{
    public function __construct()
    {
        $header = new Header();
        echo "cargar ibdex de la web (lista de recursos pedidos con fecha)";
    }
}