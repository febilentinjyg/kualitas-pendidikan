<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Kota;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\VariabelKota */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="variabel-kota-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_kota')->dropDownList(ArrayHelper::map(Kota::find()->all(), 'id', 'nama')) ?>

    <?= $form->field($model, 'tahun')->textInput() ?>

    <?= $form->field($model, 'jumlah_murid_sma')->textInput() ?>

    <?= $form->field($model, 'jumlah_penduduk_usia_sma')->textInput() ?>

    <?= $form->field($model, 'jumlah_murid_usia_sma')->textInput() ?>

    <?= $form->field($model, 'jumlah_gedung_sma')->textInput() ?>

    <?= $form->field($model, 'jumlah_guru')->textInput() ?>

    <?= $form->field($model, 'jumlah_kelas')->textInput() ?>

    <?= $form->field($model, 'jumlah_ruang_kelas')->textInput() ?>

    <?= $form->field($model, 'jumlah_ruang_kelas_baik')->textInput() ?>

    <?= $form->field($model, 'jumlah_gurudg_profesi_mengajar')->textInput() ?>

    <?= $form->field($model, 'jumlah_murid_baru')->textInput() ?>

    <?= $form->field($model, 'jumlah_lulusan_sltp')->textInput() ?>

    <?= $form->field($model, 'jumlah_murid_lulus_sma')->textInput() ?>

    <?= $form->field($model, 'jumlah_murid_tingkat3')->textInput() ?>

    <?= $form->field($model, 'jumlah_murid_mengulang')->textInput() ?>

    <?= $form->field($model, 'letak_lintang')->textInput() ?>

    <?= $form->field($model, 'letak_bujur')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
