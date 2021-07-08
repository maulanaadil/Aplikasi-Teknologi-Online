<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sebaran COVID-19 Wilayah JABAR</title>
</head>

<body>
    <h1>Data Sebaran Covid di Kabupaten Se Jawa Barat</h1>
    <form method="POST" name="f" action="">
        Kabupaten : <select name="kab" id="kab">
            <option value="0">Pilih Kabupaten</option>
            <?php
    $json = file_get_contents("https://covid19-public.digitalservice.id/api/v1/wilayah/jabar?level=kabupaten");
    $data = json_decode($json,TRUE);
    if($data["status_code"]==200){
        foreach($data["data"] as $kab){
            ?>
            <option value="<?=$kab["kode_bps"]."-".$kab["nama_wilayah"];?>"><?=$kab["nama_wilayah"];?></option>
            <?php 
        }
    }
    ?>
        </select>
        <br>
        <input type="submit" value="Cari" name="Cari">
    </form>
    <?php
    function useRegex($data){
        //apakah mengandung huruf
        if(preg_match('/^[a-zA-Z].*$/i',$data)){
         return true;
        }else{
         return false;
        }
       }
    set_time_limit(150);
    if(isset($_POST["Cari"])){
        $kab = $_POST["kab"];
        if($kab=="0"){
            echo "Pilih Kabupaten terlebih dahulu";
        }else{
        $cari = $_POST["Cari"];
        $resultExplode = explode('-',$kab);
        $json=file_get_contents("https://covid19-public.digitalservice.id/api/v1/sebaran_v2/jabar?kode_kab=".$resultExplode[0]);
        $data = json_decode($json,TRUE);
        ?>
    Wilayah : <?=$resultExplode[1];?>
    <table border="1" cellpadding=5>
        <tr>
            <th rowspan="2">Nama Kecamatan</th>
            <th rowspan="2">Nama Kelurahan</th>
            <th colspan="3" align="center">Status</th>
            <th rowspan="2">Akumulasi Jumlah Kasus</th>
            <th colspan="3">Stage</th>
        </tr>
        <tr>
            <th>Confirmation</th>
            <th>Suspect</th>
            <th>Close Contact</th>

            <th>Diisolasi</th>
            <th>Meninggal</th>
            <th>Selesai</th>
        </tr>
        </tr>
        <?php
    //buat array kecamatan
    foreach($data["data"]["content"] as $baris){
        $kec[]=array('kode_kec'=>$baris["kode_kec"],
                     'nama_kec'=>$baris["nama_kec"],
                     'status'=>$baris["status"],
                     'stage'=>$baris["stage"],
                     'kode_kel'=>$baris["kode_kel"],
                     'nama_kel'=>$baris["nama_kel"]);
    }
    unset($data);
    //array kecamatan unik
    $tempArrKec = array_unique(array_column($kec,"kode_kec"));
    $intersectKec = array_merge(array_intersect_key($kec,$tempArrKec));
    //buat array kelurahan
    
    //array kelurahan unik
    $tempArrKel = array_unique(array_column($kec,"kode_kel"));
    $intersectKel = array_merge(array_intersect_key($kec,$tempArrKel));
    
    //tulis nama tiap kecamatan yang unik ke tabel
    
    foreach($intersectKec as $kecamatan){ 
        ?>
        <tr>
            <th <?php 
            
            //apabila jumlah kelurahan > 0, maka tambahkan rowspan sebanyak kelurahan
            $i=0;
            foreach($intersectKel as $kelurahan){
                if(useRegex($kelurahan["nama_kel"])==true){      
                if(substr($kelurahan["kode_kel"],0,7)==$kecamatan["kode_kec"] ||
                strtoupper($kelurahan["nama_kel"])==strtoupper($kecamatan["nama_kel"])){
                    $i=$i+1;
                }
            }
         } if($i>0){
            echo "rowspan=".$i;
            }//akhir penambahan rowspan
            ?>><?=$kecamatan["nama_kec"];?></th>

            <?php 
            //tulis nama kelurahan berdasarkan kecamatan
                foreach($intersectKel as $kelurahan){
                    if(useRegex($kelurahan["nama_kel"])==true){
                        if(substr($kelurahan["kode_kel"],0,7)==$kecamatan["kode_kec"] ||
                        strtoupper($kelurahan["nama_kel"])==strtoupper($kecamatan["nama_kel"])){
                            ?>
            <td><?=$kelurahan["nama_kel"];?></td>
            <td><?php
                //isi jumlah data CONFIRMATION 
                $i=0;
                foreach ($kec as $value) {
                if($value["nama_kel"]==$kelurahan["nama_kel"] && strtoupper($value["status"]=="CONFIRMATION")){
                    $i+=1;
                }
            }echo $i; ?></td>
            <td><?php 
                //isi jumlah data SUSPECT
                $i=0;
                foreach ($kec as $value) {
                if($value["nama_kel"]==$kelurahan["nama_kel"] && strtoupper($value["status"]=="SUSPECT")){
                    $i+=1;
                }
            }echo $i; ?></td>
            <td><?php 
                //isi jumlah data CLOSECONTACT
                $i=0;
                foreach ($kec as $value) {
                if($value["nama_kel"]==$kelurahan["nama_kel"] && strtoupper($value["status"]=="CLOSECONTACT")){
                    $i+=1;
                }
            }echo $i; ?></td>
            <td align="center"><?php 
                //akumulasi jumlah kasus seluruhnya per kelurahan
                $i=0;
                foreach ($kec as $value) {
                if($value["nama_kel"]==$kelurahan["nama_kel"]){
                    $i+=1;
                }
            }echo $i; ?></td>
            <td><?php 
                //isi jumlah data Diisolasi
                $i=0;
                foreach ($kec as $value) {
                if($value["nama_kel"]==$kelurahan["nama_kel"] && strtoupper($value["stage"]=="Diisolasi")){
                    $i+=1;
                }
            }echo $i; ?></td>
            <td><?php 
                //isi jumlah data Meninggal
                $i=0;
                foreach ($kec as $value) {
                if($value["nama_kel"]==$kelurahan["nama_kel"] && strtoupper($value["stage"]=="Meninggal")){
                    $i+=1;
                }
            }echo $i; ?></td>
            <td><?php 
                //isi jumlah data Selesai
                $i=0;
                foreach ($kec as $value) {
                if($value["nama_kel"]==$kelurahan["nama_kel"] && strtoupper($value["stage"]=="Selesai")){
                    $i+=1;
                }
            }echo $i; ?></td>

        </tr>
        <tr>
            <?php
                        }
                }
                }//akhir perulangan nama kelurahan
            
        }//akhir perulangan nama kecamatan
    }
}
            ?>
    </table>
</body>

</html>