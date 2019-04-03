<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\IndikatorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Indikator Angka Partisipasi Kasar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indikator-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   <!--  <p>
        <?= Html::a('Create Indikator', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
<?php Pjax::begin(); ?>    
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'Kota /Kabupaten',
                'value'=>'idKota.nama',
            ],
            [
                'label'  => 'APK',
                'value' => function($model){
                    return $model->indikator->apk;
                }
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
