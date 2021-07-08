<?php
require('../network/config.php');

$db = dbConnect();
if ($db->connect_errno == 0) { // Connect database success
    $sql = "SELECT IdPegawai, concat(NamaDepan, ' ',NamaBelakang) Nama, Jabatan FROM pegawai WHERE jabatan<>'Sales Rep'";
    $res = $db->query($sql);
    if ($res) { // Eksekusi sql success
        ?>
        <table border="1">
        <tr>
            <td>Id Pegawai</td>
            <td>Nama</td>
            <td>Jabatan</td>
        </tr>
        <?php
        $data = $res->fetch_all(MYSQLI_ASSOC);
        foreach ($data as $barisdata) {
            ?>
            <tr>
                <td><?php echo $barisdata["IdPegawai"]; ?></td>
                <td><?php echo $barisdata["Nama"]; ?></td>
                <td><?php echo $barisdata["Jabatan"]; ?></td>
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
