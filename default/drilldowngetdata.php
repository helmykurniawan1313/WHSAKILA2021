<?php
$host = 'localhost';
$db = 'whsakila2021';
$user = 'root';
$pass = '';

$connection = mysqli_connect($host, $user, $pass, $db);
// get persentase kategori
$sqlKategori = 'SELECT f.kategori, 
        SUM(p.amount) AS total,
        (SUM(p.amount) / (SELECT SUM(amount) FROM fakta_pendapatan)) * 100 AS "persentase"
        FROM film f, fakta_pendapatan p 
        WHERE f.film_id = p.film_id GROUP BY f.kategori';
$resultKategori = mysqli_query($connection, $sqlKategori);
$dataKategori = [];
$objectKategori = array();
while($row = mysqli_fetch_all($resultKategori)){
    $dataKategori[] = $row;
}

foreach ($dataKategori[0] as $row){

    $objectKategori[] = array(
        'name' => $row[0],
        'y' =>$row[2],
        'drilldown' => $row[0]
    );
}

$jsonKategori = json_encode($objectKategori, JSON_NUMERIC_CHECK);
//$jsonKategori = preg_replace('/"([a-zA-Z]+[a-zA-Z0-9_]*)":/','$1:',$jsonKategori);
