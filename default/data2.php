<?php
require('koneksi.php');

$sql1 = "SELECT f.kategori kategori, 
        t.bulan as bulan,
       sum(fp.amount) as pendapatan 
    FROM film f, fakta_pendapatan fp, time t 
WHERE (f.film_id = fp.film_id) AND (t.time_id = fp.time_id) 
GROUP BY kategori, bulan";

$sql2 = "SELECT f.kategori kategori, 
                sum(fp.amount) as pembagi 
                FROM film f 
                JOIN fakta_pendapatan fp 
                ON (f.film_id = fp.film_id) 
                GROUP BY kategori";

$result1 = mysqli_query($conn,$sql1);
$result2 = mysqli_query($conn,$sql2);

$pendapatan = array();
$pembagi = array();

while ($row = mysqli_fetch_array($result1)) {
    array_push($pendapatan,array(
        "pendapatan"=>$row['pendapatan'],
        "bulan" => $row['bulan'],
        "kategori" => $row['kategori']
    ));
}

//var_dump($pendapatan[1]);

// var_dump($pendapatan[0]['pendapatan']);

while ($row = mysqli_fetch_array($result2)) {
    array_push($pembagi,array(
        "kategori" => $row['kategori'],
        "pembagi"=>$row['pembagi']
    ));
}

//var_dump($pembagi[1]['pembagi']);

//var_dump($pembagi[0]['pembagi']);

$arrayLength2 = count($pembagi);
$arrayLength = count($pendapatan);

$a = 0;
$i = 0;
$hasil = array();

function countPersen($nilai, $pembagi){

    return $nilai/$pembagi*100;
}

//for ($a = 0; $a<$arrayLength2; $a++){
//    for ($i = 0; $i<5; $i++){
//        $pembagi = $pembagi[$a]['pembagi'];
//        $pendapatan = $pendapatan[$i]['pendapatan'];
//        echo "pembagi = ". $pembagi;
//        echo "pendapatan = ".$pendapatan;
//        echo "index = ".$i;
////        echo countPersen($pendapatan, $pembagi);
//    }
//
//}
$hasil = array();
foreach ($pembagi as $item) {
    foreach ($pendapatan as $dapat) {
        if ($item["kategori"]==$dapat["kategori"]){
//            echo " ".countPersen(floatval($dapat["pendapatan"]), floatval($item["pembagi"]));
            array_push($hasil,array(
                "persen" => countPersen(floatval($dapat["pendapatan"]), floatval($item["pembagi"])),
                "bulan" => $dapat['bulan'],
                "kategori" => $dapat["kategori"]
            ));

        }

        $i++;
    }

}

$json2 = json_encode($hasil);
//while ($i < $arrayLength2)
//{
//    while ($a < 4) {
//        if ($pembagi[$i]['kategori']==$pendapatan[$a]['kategori']){
//        $pembagi = floatval($pembagi[$i]['pembagi']);
//        $pendapatan =  floatval($pendapatan[$a]['pendapatan']);
//        $hasilHitung = $pendapatan/$pembagi*100;
//        echo $hasilHitung;
//        $a++;
//        }
//    }
//    $i++;
//}

//$data = json_encode(array('result'=>$hasil), JSON_NUMERIC_CHECK);

?>