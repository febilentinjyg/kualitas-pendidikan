<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Indikator */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Indikators', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indikator-view">

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
            'tahun',
            'apk',
            'apm',
            'tingkat_pelayanan_sekolah',
            'rasio_murid_guru',
            'rasio_murid_sekolah',
            'rasio_murid_kelas',
            'rasio_kelas_ruang_kelas',
            'ruang_kelas_baik',
            'guru_layak_mengajar',
            'angka_melanjutkan',
            'angka_lulusan',
            'angka_putus_sekolah',
            'angka_mengulang',
            'rasio_input_output',
        ],
    ]) ?>

</div>
