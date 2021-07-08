<link rel="stylesheet" href="style.css" type="text/css">
<?php
$awal = $_POST['awal'];
$akhir = $_POST['akhir'];
$tbl_submit = $_POST['tblsubmit'];

define("Harga_Premium", 6550);
define("Harga_Pertalite", 7600);
define("Harga_Pertamax", 8900);
define("Harga_Solar", 5150);

echo "<h1 align='center'>Daftar Harga BBM</h1>";
echo "<hr>";
echo "<table border='1' align='center'>";
echo "<tr>
        <td class='tengah'>Liter</td>
        <td class='tengah'>Premium</td>
        <td class='tengah'>Pertalite</td>
        <td class='tengah'>Pertamax</td>
        <td class='tengah'>Solar</td>
      </tr>";

for ($i = $awal; $i <= $akhir; $i++) {
    ?>
    <tr>
        <td class=" tengah">
            <?php echo $i; ?>
        </td>
        <td>
            <?php echo "Rp " . number_format($i * Harga_Premium, 0, ",", "."); ?>
        </td>
        <td>
            <?php echo "Rp " . number_format($i * Harga_Pertalite, 0, ",", "."); ?>
        </td>
        <td>
            <?php echo "Rp " . number_format($i * Harga_Pertamax, 0, ",", "."); ?>
        </td>
        <td>
            <?php echo "Rp " . number_format($i * Harga_Solar, 0, ",", "."); ?>
        </td>
    </tr>
    <?php
}
echo "</table>";
?>




