<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\VariabelKotaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Variabel Kota';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="variabel-kota-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Variabel Kota', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id_kota',
            [
                'attribute'=>'Kota /Kabupaten',
                'value'=>'idKota.nama',
            ],
            'tahun',
            // 'jumlah_murid_sma',
            // 'jumlah_penduduk_usia_sma',
            // 'jumlah_murid_usia_sma',
            // 'jumlah_gedung_sma',
            // 'jumlah_guru',
            // 'jumlah_kelas',
            // 'jumlah_ruang_kelas',
            // 'jumlah_ruang_kelas_baik',
            // 'jumlah_gurudg_profesi_mengajar',
            // 'jumlah_murid_baru',
            // 'jumlah_lulusan_sltp',
            // 'jumlah_murid_lulus_sma',
            // 'jumlah_murid_tingkat3',
            // 'jumlah_murid_mengulang',
            // 'letak_lintang',
            // 'letak_bujur',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
