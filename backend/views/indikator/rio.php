<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\IndikatorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Indikator Input Output';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indikator-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   <!--  <p>
        <?= Html::a('Create Indikator', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
<?php Pjax::begin(); ?>    
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'nama',
             [
                'attribute'=>'Kota /Kabupaten',
                'value'=>'idKota.nama',
            ],
            //'jumlah_murid_sma',
            //'jumlah_penduduk_usia_sma',
            [
                'label'  => 'Rasio Input Output',
                'value' => function($model){
                    return $model->indikator->rasio_input_output;
                }
            ],
            // 'apk',
            // 'rasio_murid_guru',
            // 'rasio_murid_sekolah',
            // 'rasio_murid_kelas',
            // 'rasio_kelas_ruang_kelas',
            // 'ruang_kelas_baik',
            // 'guru_layak_mengajar',
            // 'angka_melanjutkan',
            // 'angka_lulusan',
            // 'angka_putus_sekolah',
            // 'angka_mengulang',
            // 'rasio_input_output',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
