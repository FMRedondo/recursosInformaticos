<?php

require_once("header.php");

$tramosHorarios = new TramosHorarios();

class TramosHorarios{

    public function __construct()
    {
        $this -> header = new Header();

        echo "Esta es la vista de tramos horarios";
    }


}