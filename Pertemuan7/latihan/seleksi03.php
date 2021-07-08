<?php
require('../network/config.php');

$db = dbConnect();
if ($db->connect_errno == 0) { // Connect Database Success
    $sql = "SELECT IdPegawai, Concat(NamaDepan, ' ',NamaBelakang)Nama, Jabatan FROM pegawai WHERE Jabatan<>'Sales Rep'";
    $res = $db->query($sql);
    if ($res) { // Eksekusi SQL Sukses
        ?>
        <table border="1">
        <tr>
            <td>Id Pegawai</td>
            <td>Nama</td>
            <td>Jabatan</td>
        </tr>
        <?php
        $data = $res->fetch_all(); // Ambil seluruh baris data
        foreach ($data as $barisdata) {
            ?>
            <tr>
                <td><?php echo $barisdata[0] ?></td>
                <td><?php echo $barisdata[1] ?></td>
                <td><?php echo $barisdata[2] ?></td>
            </tr>
            <?php
        }
        echo "</table>";
        $res->free();
    } else {
        echo "Gagal Eksekusi SQL" . (DEVELOPMENT ? " : " . $db->error : "") . "<br>";
    }
} else {
    echo "Gagal Connect SQL" . (DEVELOPMENT ? " : " . $db->error : "") . "<br>";
}
?>