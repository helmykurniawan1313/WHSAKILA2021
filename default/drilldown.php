<?php
include "drilldowngetdata.php";
include  "data2.php";
$jsonKategori = json_decode($jsonKategori, TRUE);
$jsonDetail =json_decode($json2, TRUE);
?>
<html>
<head>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<link rel="stylesheet" href="/drilldown.css"

</head>
<body>
<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        Pie chart where the individual slices can be clicked to expose more
        detailed data.
    </p>
</figure>

<script type="text/javascript">
// Create the chart
Highcharts.chart('container', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Percentage of Film Sales'
    },
    subtitle: {
        text: 'Click the slices to view detail per category.'
    },

    accessibility: {
        announceNewData: {
            enabled: true
        },
        point: {
            valueSuffix: '%'
        }
    },

    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [
        {
            name : "Kategori Film",
            colorByPoint: true,
            data : [
                <?php foreach ($jsonKategori as $row) :?>
                    {
                     name : '<?= $row["name"]; ?>',
                        y : <?= $row["y"]; ?>,
                        drilldown: '<?= $row["drilldown"]; ?>'
                    },
                <?php endforeach; ?>
            ]
        }
    ],
    drilldown: {
        series: [
            <?php for ($i=0; $i < count($jsonDetail); $i+=5):?>
            {
                name: "<?= $jsonDetail[$i]["kategori"]; ?>",
                id: "<?= $jsonDetail[$i]["kategori"]; ?>",
                data: [
                    <?php for ($a=$i; $a < $i+5; $a++):?>
                    [
                        "<?= $jsonDetail[$a]["bulan"]; ?>",
                        <?= floatval($jsonDetail[$a]["persen"]); ?>
                    ],
                    <?php endfor;?>
                ]
            },
            <?php endfor;?>
        ]}
});
</script>
<br>
<iframe name="mondrian" src="http://localhost:8080/mondrian/index.html" style="height: 100%; width:100%; border:none; align-content:center;"></iframe>
<br>
</body>
</html>