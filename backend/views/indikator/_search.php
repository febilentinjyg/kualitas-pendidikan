<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IndikatorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="indikator-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tahun') ?>

    <?= $form->field($model, 'apk') ?>

    <?= $form->field($model, 'apm') ?>

    <?= $form->field($model, 'tingkat_pelayanan_sekolah') ?>

    <?php // echo $form->field($model, 'rasio_murid_guru') ?>

    <?php // echo $form->field($model, 'rasio_murid_sekolah') ?>

    <?php // echo $form->field($model, 'rasio_murid_kelas') ?>

    <?php // echo $form->field($model, 'rasio_kelas_ruang_kelas') ?>

    <?php // echo $form->field($model, 'ruang_kelas_baik') ?>

    <?php // echo $form->field($model, 'guru_layak_mengajar') ?>

    <?php // echo $form->field($model, 'angka_melanjutkan') ?>

    <?php // echo $form->field($model, 'angka_lulusan') ?>

    <?php // echo $form->field($model, 'angka_putus_sekolah') ?>

    <?php // echo $form->field($model, 'angka_mengulang') ?>

    <?php // echo $form->field($model, 'rasio_input_output') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
