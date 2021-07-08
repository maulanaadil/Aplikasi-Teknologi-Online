<!DOCTYPE html>
<html>
<head>
    <title>Data Provinsi</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Kode</th>
            <th>Nama Provinsi</th>
        </tr>
        <?php
            $json = file_get_contents("https://api.ayongoding.id/provinsi");
            $response = json_decode($json, true);
            if($response["status"]=="OK") { // Jika status request OK
                $listprov = $response["data"];
                foreach ($listprov as $prov) // Telusuri array untuk ditampilkan didalam tabel
                    echo "<tr><td>" .$prov["id_prov"]. "</td><td>". $prov["nama"]. "</td></tr>";
            }
        ?>
    </table>
</body>
</html>

