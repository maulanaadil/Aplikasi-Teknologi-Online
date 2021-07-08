<?php
require('../network/config.php');

$db = dbConnect();
if ($db->connect_errno == 0) {
    echo "Connect Success <br>";
    $sql = "SELECT IdPegawai, concat(NamaDepan, ' ', NamaBelakang) Nama, Jabatan FROM pegawai order by IdPegawai";
    $res = $db->query($sql);
    if ($res) {
        echo "Ditemukan ".$res->num_rows." data<br>";
        $data = $res->fetch_row();
        var_dump($data);


        $data = $res->fetch_assoc();
        var_dump($data);

        $data = $res->fetch_array();
        var_dump($data);

        $res->data_seek(0);
        $data = $res->fetch_all(MYSQLI_ASSOC);
        var_dump($data);

        $res->free();
    } else {
        echo "Failed Execution SQL ". (DEVELOPMENT ? " : " .$db->error : "") . "<br>";
    }
} else {
    echo "Failed Connect ". (DEVELOPMENT ? " : " .$db->error : "") . "<br>";
}


?>