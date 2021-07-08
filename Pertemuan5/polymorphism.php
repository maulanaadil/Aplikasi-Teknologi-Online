<?php

class Karakter
{
    private $dayaHancur;
    private $energi = 100;
    private $nama;


    public function getNama()
    {
        return $this->nama;
    }

    public function getEnergi()
    {
        return $this->energi;
    }

    public function __construct($nama, $dayaHancur)
    {
        $this->nama = $nama;
        $this->dayaHancur = $dayaHancur;
    }

    public function getDayaHancur()
    {
        return $this->dayaHancur;
    }


    public function kenaMusuh($musuh)
    {
        $this->energi -= $musuh->getDayaHancur();
    }

}

class Pemanah extends Karakter
{
    public function __construct($nama)
    {
        parent::__construct($nama, 20 );
    }
}

class Penembak extends Karakter
{
    public function __construct($nama)
    {
        parent::__construct($nama, 30);
    }
}

$player = new Karakter("Player 1", 10);
$pemanah = new Pemanah("Robin");
$penembak = new Penembak("Rambo");

echo $player->getNama() . " Energi : " . $player->getEnergi() . "<br>";
$player->kenaMusuh($pemanah);

echo "Setelah kena pemanah, Energi : " . $player->getEnergi() . "<br>";
$player->kenaMusuh($penembak);
echo "Setelah kena pemanah, Energi : " . $player->getEnergi() . "<br>";
