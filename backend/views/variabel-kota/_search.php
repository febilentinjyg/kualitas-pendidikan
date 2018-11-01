<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\VariabelKotaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="variabel-kota-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_kota') ?>

    <?= $form->field($model, 'tahun') ?>

    <?= $form->field($model, 'jumlah_murid_sma') ?>

    <?= $form->field($model, 'jumlah_penduduk_usia_sma') ?>

    <?php // echo $form->field($model, 'jumlah_murid_usia_sma') ?>

    <?php // echo $form->field($model, 'jumlah_gedung_sma') ?>

    <?php // echo $form->field($model, 'jumlah_guru') ?>

    <?php // echo $form->field($model, 'jumlah_kelas') ?>

    <?php // echo $form->field($model, 'jumlah_ruang_kelas') ?>

    <?php // echo $form->field($model, 'jumlah_ruang_kelas_baik') ?>

    <?php // echo $form->field($model, 'jumlah_gurudg_profesi_mengajar') ?>

    <?php // echo $form->field($model, 'jumlah_murid_baru') ?>

    <?php // echo $form->field($model, 'jumlah_lulusan_sltp') ?>

    <?php // echo $form->field($model, 'jumlah_murid_lulus_sma') ?>

    <?php // echo $form->field($model, 'jumlah_murid_tingkat3') ?>

    <?php // echo $form->field($model, 'jumlah_murid_mengulang') ?>

    <?php // echo $form->field($model, 'letak_lintang') ?>

    <?php // echo $form->field($model, 'letak_bujur') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
