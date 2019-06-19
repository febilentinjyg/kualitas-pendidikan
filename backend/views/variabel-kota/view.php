<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\VariabelKota */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Variabel Kotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="variabel-kota-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_kota', 
            'tahun', 
            'jumlah_murid_usia_sma', 
            'jumlah_penduduk_usia_sma', 
            'jumlah_murid_sma', 
            'jumlah_murid_smp_tingkat3_ts', 
            'jumlah_murid_baru_tingkat1', 
            'jumlah_sekolah', 
            'jumlah_kelas', 
            'jumlah_ruang_kelas', 
            'jumlah_murid_mengulang', 
            'jumlah_murid_sma_ts', 
            'jumlah_murid_putus_sekolah', 
            'jumlah_murid_lulus_sma', 
            'jumlah_murid_ikut_ujian', 
            'jumlah_guru_layak_mengajar', 
            'jumlah_guru', 
            'jumlah_ruang_kelas_baik', 
            // 'longitude', 
            // 'latitude',
        ],
    ]) ?>

</div>
