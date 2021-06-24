<?php
$host = 'localhost';
$db = 'whsakila2021';
$user = 'root';
$pass = '';

$connection = mysqli_connect($host, $user, $pass, $db);
// get persentase kategori
$sqlKategori = 'select fp.store_id,
       s.nama_kota,
       sum(fp.amount),
       (sum(fp.amount) / (SELECT sum(fp.amount) from fakta_pendapatan fp)) * 100 as "persentase"
from store s, fakta_pendapatan fp
where s.store_id = fp.store_id
group by fp.store_id';
$resultKategori = mysqli_query($connection, $sqlKategori);
$dataKategori = [];
$objectKategori = array();
while($row = mysqli_fetch_all($resultKategori)){
    $dataKategori[] = $row;
}
var_dump($dataKategori);
foreach ($dataKategori[0] as $row){

    $objectKategori[] = array(
        'city' =>$row[1],
        'amount' => $row[2]
    );
}
$jsonKategori = json_encode($objectKategori, JSON_NUMERIC_CHECK);
//$jsonKategori = preg_replace('/"([a-zA-Z]+[a-zA-Z0-9_]*)":/','$1:',$jsonKategori);
