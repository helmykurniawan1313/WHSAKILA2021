<?php
include "data5.php";
include "data6.php";
$Datajson = json_decode($jsonstore1, TRUE);
$datastore2 = json_decode($jsonstore2, TRUE);
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

    title: {
        text: 'Solar Employment Growth by Sector, 2010-2016'
    },

    subtitle: {
        text: 'Source: thesolarfoundation.com'
    },

    yAxis: {
        title: {
            text: 'Number of Employees'
        }
    },

    xAxis: {
        accessibility: {
            rangeDescription: 'Range: 2010 to 2017'
        }
    },

    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 1
        }
    },

    series: [{
        name: 'Store 1',
        data: [
            <?php foreach ($Datajson as $data): ?>
            <?= $data["amount"]; ?>,
            <?php endforeach;?>
        ]
    }, {
        name: 'Store 2 ',
        data: [
            <?php foreach ($datastore2 as $item): ?>
            <?= $item["amount"]; ?>,
            <?php endforeach;?>
        ]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
</script>
</body>
</html>