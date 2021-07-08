<?php
session_start();
$_SESSION["nama"] = "Acep";
$_SESSION["kota"] = "Bandung";
echo "Sebelum unset variable count";
var_dump($_SESSION);
unset($_SESSION["count"]);
echo "Setelah unset variable count";
var_dump($_SESSION);
session_unset();
echo "Setelah session_unset ";
var_dump($_SESSION);
