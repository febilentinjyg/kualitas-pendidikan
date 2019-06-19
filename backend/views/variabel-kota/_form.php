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

    <?= $form->field($model, 'jumlah_murid_usia_sma')->textInput() ?>

    <?= $form->field($model, 'jumlah_penduduk_usia_sma')->textInput() ?>

    <?= $form->field($model, 'jumlah_murid_sma')->textInput() ?>

    <?= $form->field($model, 'jumlah_murid_smp_tingkat3_ts')->textInput() ?>

    <?= $form->field($model, 'jumlah_murid_baru_tingkat1')->textInput() ?>

    <?= $form->field($model, 'jumlah_sekolah')->textInput() ?>

    <?= $form->field($model, 'jumlah_kelas')->textInput() ?>

    <?= $form->field($model, 'jumlah_ruang_kelas')->textInput() ?>

    <?= $form->field($model, 'jumlah_murid_mengulang')->textInput() ?>

    <?= $form->field($model, 'jumlah_murid_sma_ts')->textInput() ?>

    <?= $form->field($model, 'jumlah_murid_putus_sekolah')->textInput() ?>

    <?= $form->field($model, 'jumlah_murid_lulus_sma')->textInput() ?>

    <?= $form->field($model, 'jumlah_murid_ikut_ujian')->textInput() ?>

    <?= $form->field($model, 'jumlah_guru_layak_mengajar')->textInput() ?>

    <?= $form->field($model, 'jumlah_guru')->textInput() ?>

    <?= $form->field($model, 'jumlah_ruang_kelas_baik')->textInput() ?>
<!-- 
    <?= $form->field($model, 'longitude')->textInput() ?>

    <?= $form->field($model, 'latitude')->textInput() ?>
 -->
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
