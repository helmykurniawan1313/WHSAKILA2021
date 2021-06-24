<?php
include "data8.php";
$Datajson = json_decode($jsonKategori, TRUE);
?>
<html>
<head>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<link rel="stylesheet" href="drilldown.css">

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
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Browser market shares in January, 2018'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [
        {
            name : "Kategori Film",
            colorByPoint: true,
            data : [
                <?php foreach ($Datajson as $row) :?>
                {
                    name : '<?= $row["city"]; ?>',
                    y : <?= $row["amount"]; ?>

                },
                <?php endforeach; ?>
            ]
        }
    ]
});
</script>
</body>
</html>