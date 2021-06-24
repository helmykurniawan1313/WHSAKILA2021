<?php
$host = 'localhost';
$db = 'whsakila2021';
$user = 'root';
$pass = '';

$connection = mysqli_connect($host, $user, $pass, $db);
// get persentase kategori
$sqlKategori = 'SELECT t.bulan as bulan,
       sum(fp.amount) as pendapatan
    FROM fakta_pendapatan fp, time t
 WHERE (t.time_id = fp.time_id)
GROUP BY bulan';
$resultKategori = mysqli_query($connection, $sqlKategori);
$dataKategori = [];
$objectKategori = array();
while($row = mysqli_fetch_all($resultKategori)){
    $dataKategori[] = $row;
}

foreach ($dataKategori[0] as $row){

    $objectKategori[] = array(
        'month' =>$row[0],
        'amount' => $row[1]
    );
}
$jsonKategori = json_encode($objectKategori, JSON_NUMERIC_CHECK);
//$jsonKategori = preg_replace('/"([a-zA-Z]+[a-zA-Z0-9_]*)":/','$1:',$jsonKategori);
