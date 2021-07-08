<?php
require('../network/config.php');

$db = dbConnect();
if ($db->connect_errno == 0) {
    echo "Connect db Success <br>";
    $sql = "SELECT IdPegawai, concat(NamaDepan, ' ',NamaBelakang) Nama, Jabatan FROM pegawai WHERE jabatan<>'Sales Rep'";
    $res = $db->query($sql);

    if ($res) { // Eksekusi sql sukses
        ?>
        <table border="1">
        <tr>
            <td>Id Pegawai</td>
            <td>Nama</td>
            <td>Jabatan</td>
        </tr>
        <?php
        while ($data = $res->fetch_assoc()) { // Ambil data per baris
            ?>
            <tr>
                <td><?php echo $data["IdPegawai"]; ?></td>
                <td><?php echo $data["Nama"]; ?></td>
                <td><?php echo $data["Jabatan"]; ?></td>
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
