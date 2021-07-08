<?php
session_start();
require('../function/function.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Data Produk</title>
</head>
<body>
<h1>Tambah Data Produk</h1>
<a href="../produk.php">
    <button>
        View Produk
    </button>
</a>
<form method="post" name="frm" action="produk-simpan.php">
    <table border="1">
        <tr>
            <td>Id Produk</td>
            <td><input type="text" name="IdProduk" size="16" maxlength="15"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="Nama" size="71" maxlength="70"></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td><select name="IdKategori">
                    <option>Pilih Kategori</option>
                    <?php
                    $dataKategori = getListKategori(); // ambil data kategori, kemudian susun menjadi comboBox
                    foreach ($dataKategori as $data) {
                        echo "<option value=\"" . $data["IdKategori"] . "\">" . $data["Nama"] . "</option>";
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td>Skala</td>
            <td><input type="text" name="Skala" size="11" maxlength="10"></td>
        </tr>
        <tr>
            <td>Stok</td>
            <td><input type="text" name="Stok" size="7" maxlength="6"></td>
        </tr>
        <tr>
            <td>Harga Beli</td>
            <td><input type="text" name="HargaBeli" size="9" maxlength="8"></td>
        </tr>
        <tr>
            <td>Harga Jual</td>
            <td><input type="text" name="HargaJual" size="9" maxlength="8"></td>
        </tr>
        <tr>
            <td>Pemasok</td>
            <td><input type="text" name="Pemasok" size="51" maxlength="50"></td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td><textarea name="Deskripsi" cols="80" rows="8"></textarea></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="TblSimpan" value="Simpan"</td>
        </tr>
    </table>
</form>
</body>
</html>
