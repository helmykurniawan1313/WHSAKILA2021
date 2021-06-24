<?php
$host = 'localhost';
$db = 'whsakila2021';
$user = 'root';
$pass = '';

$connection = mysqli_connect($host, $user, $pass, $db);
// get persentase kategori
$sqlKategori = 'SELECT t.bulan as bulan,
       fp.store_id,
       sum(fp.amount) as pendapatan
    FROM film f, fakta_pendapatan fp, time t, store s
WHERE (f.film_id = fp.film_id) AND (t.time_id = fp.time_id) AND (fp.store_id = 1)
GROUP BY bulan';
$resultKategori = mysqli_query($connection, $sqlKategori);
$dataKategori = [];
$objectKategori = array();
while($row = mysqli_fetch_all($resultKategori)){
    $dataKategori[] = $row;
}

foreach ($dataKategori[0] as $row){

    $objectKategori[] = array(
        'month' => $row[0],
        'amount' => $row[2]
    );
}

$jsonstore1 = json_encode($objectKategori, JSON_NUMERIC_CHECK);
//$jsonKategori = preg_replace('/"([a-zA-Z]+[a-zA-Z0-9_]*)":/','$1:',$jsonKategori);
