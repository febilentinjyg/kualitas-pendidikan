<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\VariabelKota */

$this->title = 'Create Variabel Kota';
$this->params['breadcrumbs'][] = ['label' => 'Variabel Kotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="variabel-kota-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
