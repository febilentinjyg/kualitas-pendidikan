<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Kualitas Pendidikan';

$this->registerJS(
<<<JS
$.getJSON('http://localhost:8080/tugasAkhir/backend/web/api/grafik-kualitas-pendidikan', function(response){
  		Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Persentase Kualitas Pendidikan Tingkat SLTA di Jawa Timur'
    },
    tooltip: {
        pointFormat: '{point.name}: <b>{point.y}</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.y}',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Kualitas Pendidikan',
        colorByPoint: true,
        data: response,
    }]
});
  });
JS
);
?>

  	<section class="content" id="container"   style="height: 500px">                    
      
    </section>