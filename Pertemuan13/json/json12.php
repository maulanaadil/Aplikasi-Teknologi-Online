<html>
<head>
    <title>Data Covid</title>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>


Kabupaten : <select name="kabupaten" id="slc-kabupaten">
    <option value="">Pilih Kabupaten</option>
    <?php
    error_reporting(E_ALL);
    $json = file_get_contents('https://covid19-public.digitalservice.id/api/v1/wilayah/jabar?level=kabupaten');
    $response = json_decode($json, true);
    if ($response["status_code"] == 200) {
        foreach ($response["data"] as $kab) {
            echo "<option value=\"" . $kab["kode_bps"] . "\">" . $kab["nama_wilayah"] . "</option>";
        }
    }
    ?>
</select>
<input type="button" value="Cari" id="btn-cari" onclick="showData()">

<table border="1" id="table">
    <thead>
    <tr>
        <th>Kabupaten Kota</th>
        <th>Kecamatan</th>
        <th>Kelurahan</th>
        <th>Umur</th>
        <th>Gender</th>
    </tr>
    </thead>
    <tbody id="data-covid">

    </tbody>
</table>
<script>

    function showData() {
        let slc_kab = document.getElementById("slc-kabupaten");
        $.ajax({
            type: "GET",
            url: "https://covid19-public.digitalservice.id/api/v1/sebaran_v2/jabar?kode_kab=" + slc_kab.value,
            beforeSend: function () {
                $("#btn-cari").prop("disabled", true);
                $("#data-covid").html("<tr><td colspan='5'><marquee behavior='alternate'><blink>mohon tunggu....</blink></marquee>");
            },
            success: function (response) {
                $("#btn-cari").prop("disabled", false);
                $("#data-covid").html("");
                let data = response;

                $.each(data, function (index, value) {
                    $.each(value['content'], function (j, item2) {
                        var data_covid = '<tr><td>' + item2.nama_kab + '</td><td>' + item2.nama_kec + '</td><td>' + item2.nama_kab + '</td><td>' + parseInt(item2.umur) + '</td> <td>' + item2.gender + '</td> </tr>';
                        $("#data-covid").append(data_covid);
                    });
                });
            }
        })
    }
</script>
</body>
</html>