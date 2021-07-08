<?php
session_start();
require('../function/function.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pembaruan Data Produk</title>
</head>
<body>
<h1>Pembaruan Data Produk</h1>
<?php
if (isset($_POST["TblUpdate"])) {
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        // Bersihkan Data
        $IdProduk = $db->escape_string($_POST["IdProduk"]);
        $Nama = $db->escape_string($_POST["Nama"]);
        $IdKategori = $db->escape_string($_POST["IdKategori"]);
        $Skala = $db->escape_string($_POST["Skala"]);
        $Stok = $db->escape_string($_POST["Stok"]);
        $HargaBeli = $db->escape_string($_POST["HargaBeli"]);
        $HargaJual = $db->escape_string($_POST["HargaJual"]);
        $Pemasok = $db->escape_string($_POST["Pemasok"]);
        $Deskripsi = $db->escape_string($_POST["Deskripsi"]);

        // Susun query Update
        $sql = "UPDATE produk SET
                    Nama='$Nama',
                    IdKategori='$IdKategori',
                    Skala='$Skala',
                    Pemasok='$Pemasok',
                    Deskripsi='$Deskripsi',
                    Stok='$Stok',
                    HargaBeli='$HargaBeli',
                    HargaJual='$HargaJual',
                    IdPegawai='". $db->escape_string($_SESSION["IdPegawai"]). "'
                WHERE IdProduk='$IdProduk'";
        // Eksekusi Sql
        $res = $db->query($sql);
        if ($res) {
            if ($db->affected_rows > 0) { // Jika ada update data
                ?>
                Data Berhasil DiUpdate.<br>
                <a href="../produk.php">
                    <button>View Produk</button>
                </a>
                <?php
            } else { // Jika sql sukses tapi tidak ada data yang berubah
                ?>
                Data Berhasil diupdate tanpa ada perubahan data.<br>
                <table>
                    <tr>
                        <td><a href="javascript:history.back()">
                                <button>Edit Kembali</button>
                            </a>
                        </td>
                        <td>
                            <a href="../produk.php">
                                <button>View Produk</button>
                            </a>
                        </td>
                    </tr>
                </table>
                <?php
            }
        } else { // Gagal query
            ?>Data Gagal diupdate.
            <a href="javascript:history.back()">
                <button>Edit Kembali</button>
            </a>
            <?php
        }
    } else {
        echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
    }
}

?>
</body>
</html>
