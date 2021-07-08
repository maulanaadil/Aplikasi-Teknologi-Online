<?php
class Math {
    const PI = 3.14;
    function luasLingkaran($radius) {
        return self::PI * $radius * $radius;
    }
}

$hitung = new Math();
echo "Nilai PI = ". $hitung::PI. "<br>";
echo "Luas Lingkaran dengan radius 10 = ". $hitung->luasLingkaran(10). "<br>";
