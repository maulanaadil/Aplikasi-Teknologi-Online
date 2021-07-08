<?php
require ('./function/function.php');

$db = dbConnect();
if ($db->connect_errno == 0) {
    if (isset($_POST["TblLogin"])) {
        $IdPegawai = $db->escape_string($_POST["IdPegawai"]);
        $password = $db->escape_string($_POST["password"]);
        $sql = "SELECT IdPegawai,NamaDepan,NamaBelakang,Jabatan FROM pegawai
                WHERE IdPegawai='$IdPegawai' and Pass=md5('$password')";
        $res = $db->query($sql);
        if ($res) {
            if ($res->num_rows == 1) {
                $data = $res->fetch_assoc();
                session_start();
                $_SESSION["IdPegawai"] = $data["IdPegawai"];
                $_SESSION["NamaDepan"] = $data["NamaDepan"];
                $_SESSION["NamaBelakang"] = $data["NamaBelakang"];
                $_SESSION["Jabatan"] = $data["Jabatan"];
                header("Location: index-admin.php");
            } else
                header("Location: index.php?error=1");
        }
    } else
        header("Location: index.php?error=2");
} else
    header("Location: index.php?error=3");
