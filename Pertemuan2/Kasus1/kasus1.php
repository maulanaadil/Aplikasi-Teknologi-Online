<!DOCTYPE html>
<html lang="en">
<form action="bbm.php" method="post">
    <head>
        <meta charset="UTF-8">
        <title>Daftar Harga BBM</title>
        <link rel="mainSheet" href="style.css">
    </head>
    <body>

        <table align="center" border="0">
            <tr><td colspan="3" align="center"><h1>Daftar Harga BBM</h1></td></tr>
            <tr><td>Nama<td>:<td>Maulana Adil</td></tr>
            <tr><td>Nim<td>:<td>10119221</td></tr>
        </table>
        <br>
        <table border="1" align="center">
            <tr>
                <td align="center">Liter</td>
                <td align="center">Liter Akhir</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td><input type="text" name="awal" size="5" value="<?php echo isset($_POST["awal"])? $_POST["awal"]:"";?>"></td>
                <td><input type="text" name="akhir" size="5" value="<?php echo isset($_POST["akhir"])? $_POST["akhir"]:"";?>" </td>
                <td><input type="submit" name="tblsubmit" value="View"></td>
            </tr>
        </table>
    </body>
</form>
</html>