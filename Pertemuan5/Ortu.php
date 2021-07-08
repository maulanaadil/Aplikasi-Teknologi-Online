<?php


class Ortu
{
    public function belanja()
    {
        echo "Belanja ke pasar... <br>";
    }
}

class Anak extends Ortu {
    public function belanja()
    {
        echo "Belanja Online dong.... <br>";
    }
}

$ortu = new Ortu();
$anak = new Anak();

$ortu->belanja();
$anak->belanja();