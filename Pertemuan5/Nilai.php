<?php

class Nilai
{
    private $nilaiTugas;
    private $nilaiUAS;
    private $nilaiUTS;

    public function setNilaiTugas($nilai)
    {
        if (($nilai >= 0) && ($nilai <= 100)) {
            return $this->nilaiTugas = $nilai;
        }
    }

    public function setNilaiUTS($nilai)
    {
        if (($nilai >= 0) && ($nilai <= 100)) {
            return $this->nilaiUTS = $nilai;
        }
    }

    public function setNilaiUAS($nilai)
    {
        if (($nilai >= 0) && ($nilai <= 100)) {
            return $this->nilaiUAS = $nilai;
        }
    }

    public function getNilaiTugas()
    {
        return $this->nilaiTugas;
    }

    public function getNilaiUAS()
    {
        return $this->nilaiUAS;
    }

    public function getNilaiUTS()
    {
        return $this->nilaiUTS;
    }

    public function getNilaiAkhir()
    {
        return 0.20 * $this->getNilaiTugas() + 0.30 * $this->getNilaiUTS() + 0.50 * $this->getNilaiUAS();
    }

    public function getIndex()
    {
        $nilaiAkhir = $this->getNilaiAkhir();
        if ($nilaiAkhir >= 80) {
            return "A";
        } else
            if ($nilaiAkhir >= 68) {
                return "B";
            } else
                if ($nilaiAkhir >= 56) {
                    return "C";
                } else
                    if ($nilaiAkhir >= 45) {
                        return "D";
                    } else
                        if ($nilaiAkhir >= 0) {
                            return "E";
                        }
    }
}
