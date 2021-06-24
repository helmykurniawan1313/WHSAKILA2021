<?php
$host = 'localhost';
$db = 'whsakila2021';
$user = 'root';
$pass = '';

$connection = mysqli_connect($host, $user, $pass, $db);
// get persentase kategori
$sqlKategori = 'select p.customer_id,c.nama,
       count(p.customer_id) as "jumlah_sewa",
       sum(p.amount) as "biaya_total_sewa"
from fakta_pendapatan p,
     customer c
where p.customer_id = c.customer_id
group by p.customer_id
order by biaya_total_sewa desc
limit 5';
$resultKategori = mysqli_query($connection, $sqlKategori);
$dataKategori = [];
$objectKategori = array();
while($row = mysqli_fetch_all($resultKategori)){
    $dataKategori[] = $row;
}
foreach ($dataKategori[0] as $row){

    $objectKategori[] = array(
        'name' => $row[1],
        'y' =>$row[2],
        'drilldown' => $row[0]
    );
}

$jsonKategori = json_encode($objectKategori, JSON_NUMERIC_CHECK);
//$jsonKategori = preg_replace('/"([a-zA-Z]+[a-zA-Z0-9_]*)":/','$1:',$jsonKategori);
