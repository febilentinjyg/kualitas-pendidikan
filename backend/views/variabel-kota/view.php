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
            'jumlah_murid_sma',
            'jumlah_penduduk_usia_sma',
            'jumlah_murid_usia_sma',
            'jumlah_gedung_sma',
            'jumlah_guru',
            'jumlah_kelas',
            'jumlah_ruang_kelas',
            'jumlah_ruang_kelas_baik',
            'jumlah_gurudg_profesi_mengajar',
            'jumlah_murid_baru',
            'jumlah_lulusan_sltp',
            'jumlah_murid_lulus_sma',
            'jumlah_murid_tingkat3',
            'jumlah_murid_mengulang',
            'longitude',
            'latitude',
        ],
    ]) ?>

</div>
