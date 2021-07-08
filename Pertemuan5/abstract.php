<?php

abstract class MakhlukHidup
{
    abstract public function bergerak();
}

class Mamalia extends MakhlukHidup
{
    public function bergerak()
    {
        echo "Mamalia berjalan di darat<br>";
    }
}

class Burung extends MakhlukHidup
{
    public function bergerak()
    {
        echo "Burung terbang<br>";
    }
}

$sapi = new Mamalia();
$merpati = new Burung();

$sapi->bergerak();
$merpati->bergerak();
