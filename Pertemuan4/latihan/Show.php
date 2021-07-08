<?php

class Show
{
    public static function tampilkanNama($nama)
    {
        echo "Nama Saya adalah : $nama";
    }

    public static function tampilTanggalIndonesia($tgl, $showTahun = true)
    {
        $namaBulan = array(
            1 => "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember"
        );
        $tahun = substr($tgl, 0, 4);
        $bulan = (int)substr($tgl, 5, 2);
        $tanggal = substr($tgl, -2);
        return $tanggal . "-" . $namaBulan[$bulan] . ($showTahun == true ? "-" . $tahun : "");
    }

    public static function menampilkanDataMahasiswa($nim)
    {
        $kodeFakultas = substr($nim, 0, 1);
        $kodeProdi = substr($nim, 1, 2);
        $namaFakultas = array(1 => "Teknik Dan Ilmu Komputer",
            2 => "Ekonomi Dan Bisnis",
            3 => "Hukum",
            4 => "Sosial Politik",
            5 => "Design",
            6 => "Sastra");

        echo "NIM : $nim <br>";
        echo "Fakultas : " . $namaFakultas[$kodeFakultas] . "<br>";
        echo "Prodi : ";
        if ($kodeProdi == '1') {
            echo "Teknik Informatika";
        } else if ($kodeProdi == '02') {
            echo "Teknik Komputer SI";
        } else if ($kodeProdi == '09') {
            echo "Manajemen Informatika D3";
        } else {
            echo "Tidak Dikenal";
        }
        echo "<br>";
        echo "Nomor Urut : " . substr($nim, -3) . "<br>";
        echo "Tahun Masuk : 20" . substr($nim, 3, 2);
        echo "<br>";
    }
}