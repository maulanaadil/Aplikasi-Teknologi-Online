<?php
require('../function/function.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Hapus Data Produk</title>
</head>
<body>
    <h1>Hapus Data Produk</h1>
<?php
    if (isset($_GET["IdProduk"])) {
        $db = dbConnect();
        $IdProduk = $db->escape_string($_GET["IdProduk"]);
        if ($dataproduk = getDataProduk($IdProduk)) { // Cari data produk, kalau ada simpan di data
            ?>
    <a href="../produk.php"><button>View Produk</button></a>
    <form method="post" name="frm" action="produk-hapus.php">
        <input type="hidden" name="IdProduk" value="<?php echo $dataproduk["IdProduk"]; ?>">
        <table border="1">
            <tr>
                <td>Id Produk</td>
                <td><?php echo $dataproduk["IdProduk"];?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><?php echo $dataproduk["Nama"];?></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td><?php echo $dataproduk["NamaKategori"];?></td>
            </tr>
            <tr>
                <td>Skala</td>
                <td><?php echo $dataproduk["Skala"];?></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><?php echo $dataproduk["Stok"];?></td>
            </tr>
            <tr>
                <td>Harga Beli</td>
                <td><?php echo $dataproduk["HargaBeli"];?></td>
            </tr>
            <tr>
                <td>Harga Jual</td>
                <td><?php echo $dataproduk["HargaJual"];?></td>
            </tr>
            <tr>
                <td>Pemasok</td>
                <td><?php echo $dataproduk["Pemasok"];?></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><?php echo $dataproduk["Deskripsi"];?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="TblHapus" value="Hapus"></td>
            </tr>
        </table>
    </form>
        <?php
        } else {
            echo "IdProduk dengan id : $IdProduk tidak ada. Penghapusan Dibatalkan";
        }
    } else {
        echo "IdProduk tidak ada, Penghapusan ditabatalkan";
    }

?>
</body>
</html>