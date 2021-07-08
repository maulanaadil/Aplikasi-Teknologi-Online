<?php

class Waktu
{
    private $menitWaktu = 0;

    public function getJam()
    {
        return $this->menitWaktu / 60;
    }

    public function getMenit()
    {
        return $this->menitWaktu % 60;
    }

    public function setJam($jam)
    {
        return $this->menitWaktu = $jam * 60;
    }

    public function setMenit($menit)
    {
        return $this->menitWaktu = $this->menitWaktu + $menit;
    }

    public function getMenitWaktu()
    {
        return $this->menitWaktu;
    }



}
