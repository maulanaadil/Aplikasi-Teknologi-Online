<?php require("./function/function.php"); ?>
<?php banner(); ?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <center>
    <h1>Login</h1>
    <?php
    if (isset($_GET["error"])) {
        $error = $_GET["error"];
        if ($error == 1)
            showError("IdPegawai dan password tidak sesuai.");
        else if ($error == 2)
            showError("Error database. Silahkan hubungi administator");
        else if ($error == 3)
            showError("Koneksi ke Database gagal. Autentitaksi gagal.");
        else if ($error == 4)
            showError("Anda tidak boleh mengakses halaman sebelumnya karena belum login. Silahkan login terlebih dahulu");
        else
            showError("Unknown Error.");
    } ?>
    </center>
    <center>
        <form method="post" name="f" action="login.php">
            <table border="1">
                <tr>
                    <th colspan="2">Login</th>
                </tr>
                <tr>
                    <td>Id Pegawai</td>
                    <td><input type="text" name="IdPegawai" maxlength="4" size="5"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" maxlength="16" size="9"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="TblLogin" value="Login"></td>
                </tr>
            </table>
        </form>
    </center>
</body>
</html>
