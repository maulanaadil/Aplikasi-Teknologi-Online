<?php
session_start();
if (!isset($_SESSION["IdPegawai"]))
    header("Location: index.php?error=4");
?>

<?php
require('function/function.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Data Produk</title>
</head>
<body>
<?php banner(); ?>
<?php navigator(); ?>
<h1>Data Produk</h1>
<?php
$db = dbConnect();
if ($db->errno == 0) {
    $sql = "SELECT p.IdProduk, p.Nama, k.Nama NamaKategori, p.Skala, p.Stok, p.HargaBeli, p.HargaJual, p.Pemasok FROM produk p JOIN kategori k ON p.IdKategori=k.IdKategori";
    $res = $db->query($sql);

    if ($res) {
        ?>
        <a href="add/produk-form-tambah.php">
            <button>Tambah Data</button>
        </a>
        <table border="1">
            <tr>
                <td>Id Produk</td>
                <td>Nama</td>
                <td>Kategori</td>
                <td>Skala</td>
                <td>Stok</td>
                <td>Harga Beli</td>
                <td>Harga Jual</td>
                <td>Harga Pemasok</td>
                <td>Aksi</td>
            </tr>
            <?php
            $data = $res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
            foreach ($data as $barisdata) { // telurusi satu per satu
                ?>
                <tr>
                    <td><?php echo $barisdata["IdProduk"]; ?></td>
                    <td><?php echo $barisdata["Nama"]; ?></td>
                    <td><?php echo $barisdata["NamaKategori"]; ?></td>
                    <td><?php echo $barisdata["Skala"]; ?></td>
                    <td><?php echo $barisdata["Stok"]; ?></td>
                    <td><?php echo $barisdata["HargaBeli"]; ?></td>
                    <td><?php echo $barisdata["HargaJual"]; ?></td>
                    <td><?php echo $barisdata["Pemasok"]; ?></td>
                    <td>
                        <a href="./edit/produk-form-edit.php?IdProduk=<?php echo $barisdata["IdProduk"]; ?>">
                            <button>Edit</button>
                        </a>|
                        <a href="./delete/produk-konfirmasi-hapus.php?IdProduk=<?php echo $barisdata["IdProduk"] ?>">
                            <button>Hapus</button>
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    } else {
        echo "Gagal Eksekusi SQL" . (DEVELOPMENT ? " : " . $db->error : "") . "<br>";
    }
} else {
    echo "Gagal Koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
}
?>
</body>
</html>
