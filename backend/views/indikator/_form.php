<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Indikator */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="indikator-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tahun')->textInput() ?>

    <?= $form->field($model, 'apk')->textInput() ?>

    <?= $form->field($model, 'apm')->textInput() ?>

    <?= $form->field($model, 'tingkat_pelayanan_sekolah')->textInput() ?>

    <?= $form->field($model, 'rasio_murid_guru')->textInput() ?>

    <?= $form->field($model, 'rasio_murid_sekolah')->textInput() ?>

    <?= $form->field($model, 'rasio_murid_kelas')->textInput() ?>

    <?= $form->field($model, 'rasio_kelas_ruang_kelas')->textInput() ?>

    <?= $form->field($model, 'ruang_kelas_baik')->textInput() ?>

    <?= $form->field($model, 'guru_layak_mengajar')->textInput() ?>

    <?= $form->field($model, 'angka_melanjutkan')->textInput() ?>

    <?= $form->field($model, 'angka_lulusan')->textInput() ?>

    <?= $form->field($model, 'angka_putus_sekolah')->textInput() ?>

    <?= $form->field($model, 'angka_mengulang')->textInput() ?>

    <?= $form->field($model, 'rasio_input_output')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
