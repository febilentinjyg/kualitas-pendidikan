<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\VariabelKota */

$this->title = 'Update Variabel Kota: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Variabel Kotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="variabel-kota-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
