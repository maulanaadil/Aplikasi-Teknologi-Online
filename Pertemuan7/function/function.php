<?php
/*
 * Ieu kunaonnya naha te bisa ngaimport di kelas lain
 */
define("DEVELOPMENT", TRUE);
function dbConnect()
{
    $db = new mysqli("localhost", "root", "", "db10119221");
    return $db;
}

//require_once ('../network/config.php');

function getListKategori()
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * FROM kategori ORDER BY IdKategori");
        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        } else {
            return FALSE;
        }
    } else {
        return FALSE;
    }
}


function getDataProduk($IdProduk)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query(
            "SELECT p.IdProduk, p.Nama, p.IdKategori, p.Skala, p.Pemasok, p.Deskripsi, p.Stok, p.HargaBeli, p.HargaJual, k.Nama NamaKategori, k.Keterangan KeteranganKategori 
                   FROM produk p 
                       JOIN kategori k 
                           ON p.IdKategori = k.IdKategori 
                   WHERE p.IdProduk='$IdProduk'");
        if ($res) {
            if ($res->num_rows > 0) {
                $data = $res->fetch_assoc(); // Ambil satu baris didalam table
                $res->free();
                return $data;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    } else {
        return FALSE;
    }
}

function banner()
{
    ?>
    <div id="banner">
        <center>
            <h1>Pt. Sagala Aya</h1>
            <hr>
        </center>
    </div>
    <?php
}

function navigator()
{
    ?>
    <div id="navigator">
        | <a href="produk.php">Produk</a>
        | <a href="kategori.php">Kategori</a>
        | <a href="pelanggan.php">Pelanggan</a>
        | <a href="pegawai.php">Pegawai</a>
        | <a href="kantor.php">Kantor</a>
        | <a href="pesanan.php">Pesanan</a>
        | <a href="pembayaran.php">Pembayaran</a>
        | <a href="logout.php">Logout</a>
        |
    </div>
    <?php
}

function showError($message)
{
    ?>
    <div style="
    width: 300px;
    background-color:#FAEBD7;
    padding:10px;
    border:1px solid red;
    margin:15px 0px;
    text-align: left;
    ">
        <?php echo $message; ?>
    </div>
    <?php
}

?>
