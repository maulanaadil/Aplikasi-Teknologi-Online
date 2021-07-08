<?php
	class Pegawai{
		public $nama;
		public $umur;
		public $kota;
	}
	
	$pegawai1=new Pegawai();
	$pegawai1->nama="Cecep";
	$pegawai1->umur=22;
	$pegawai1->kota="Bandung";
	$json=json_encode($pegawai1);  // konversikan menjadi json
	echo "JSON :<br>".$json; // tampilkan hasil konversinya
