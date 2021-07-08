<?php

class Ortu
{
    protected $nama;
    public function __construct($nama)
    {
        $this->nama = $nama;
        echo $this->nama. " Dilahirkan <br>";
    }

    public function kehidupan() {
        echo $this->nama. " sedang menjalani kehidupan<br>";
    }

    public function __destruct()
    {
        echo $this->nama. " meninggal...";
    }
}

$ortu = new Ortu("Udin");
$ortu->kehidupan();
echo "Proes lain..<br>";
