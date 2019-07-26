<?php

namespace backend\controllers;

use Yii;
use backend\models\NilaiDefuzzifikasiTigaVariabel;
use backend\models\RuleKualitasOutput;
use backend\models\Indikator;
use backend\models\Kota;
use backend\models\NilaiFuzzy;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class RuleKualitasOutputController extends \yii\web\Controller
{
	 public function actionRule()
     {
    	
    // 	for ($am=1; $am<=3; $am++){
    // 		for ($al=1; $al<=3; $al++){
    // 			for ($aps=1; $aps<=3; $aps++){
    // 				for ($au=1; $au<=3; $au++){
    // 					for ($rio=1; $rio<=3; $rio++){
    // 						$model = new RuleKualitasOutput();
				//     		$nilai = $am + $al + $aps + $au + $rio;
				//     		$model->kriteria_am = $am;
				//     		$model->kriteria_al = $al;
				//     		$model->kriteria_aps = $aps;
				//     		$model->kriteria_au = $au;
				//     		$model->kriteria_rio = $rio;
				//     		$model->nilai_kualitas_output = $nilai;
				//     		$model->save();
				//     	}
				//     }
				// }
    //     	}
    //     }
        
     	$model = RuleKualitasOutput::find()->all();
    	return $this->render('index', [
    		'active' => 'rule_ko',
    		'output' => $model]);	
	}

	public function actionViewBobot()
    {
        $model = Indikator::find()
            ->select(['indikator.*', 'kota.nama as nama_kota'])
            ->innerJoin('variabel_kota', 'variabel_kota.id = indikator.id_varkota')
            ->innerJoin('kota', 'kota.id = variabel_kota.id_kota')
            ->orderBy('id_kota')
            ->asArray()
            ->all();

        return $this->render('index', [
            'active' => 'nilaibobot',
            'output'=> $model]);
    } 

    public function actionNilaiFuzzyKualitasOutput()
    {
        $model = NilaiFuzzy::find()
        ->select(['nilai_fuzzy.*', 'kota.nama as nama_kota'])
        ->where(['in', 'indikator', ['AM', 'AL', 'APS', 'AU', 'RIO']])
        ->innerJoin('kota', 'kota.id = nilai_fuzzy.id_kota')
        ->asArray()
        ->all();

        return $this->render('index',[
         'active' => 'fuzzifikasi_ko',
         'output' => $model
        ]);
    }

    public function actionInferensiFuzzy()
    {
        $rule = RuleKualitasOutput::find()->all();
        $kota = Kota::find()->all();
        $model = NilaiFuzzy::find()
        ->select(['nilai_fuzzy.*', 'kota.nama as nama_kota'])
        ->where(['in', 'indikator', ['AM', 'AL', 'APS', 'AU', 'RIO']])
        ->innerJoin('kota', 'kota.id = nilai_fuzzy.id_kota')
        ->asArray()
        ->all();

        $labelIndikator = [
            1 => 'rendah', 
            2 => 'tinggi', 
            3 => 'sangat_tinggi'];

        foreach ($rule as $key => $ruleItem) {
            $fuzzyRow = [];
            foreach ($kota as $key => $kotaItem) {
                $fuzzy = [];

                $fuzzyAm = array_filter($model, function($val, $i) use ($kotaItem) {
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'AM';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyAm) ? array_shift($fuzzyAm)[
                    $labelIndikator[$ruleItem['kriteria_am']]
                ] : 0;
                //---------------------------------------------------
                $fuzzyAl = array_filter($model, function($val, $i) use ($kotaItem){
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'AL';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyAl) ? array_shift($fuzzyAl)[
                    $labelIndikator[$ruleItem['kriteria_al']]
                ] : 0;
                //---------------------------------------------------
                $fuzzyAps = array_filter($model, function($val, $i) use ($kotaItem){
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'APS';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyAps) ? array_shift($fuzzyAps)[
                    $labelIndikator[$ruleItem['kriteria_aps']]
                ] : 0;
                //---------------------------------------------------
                $fuzzyAu = array_filter($model, function($val, $i) use ($kotaItem){
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'AU';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyAu) ? array_shift($fuzzyAu)[
                    $labelIndikator[$ruleItem['kriteria_au']]
                ] : 0;
                //---------------------------------------------------
                $fuzzyRio = array_filter($model, function($val, $i) use ($kotaItem){
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'RIO';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyRio) ? array_shift($fuzzyRio)[
                    $labelIndikator[$ruleItem['kriteria_rio']]
                ] : 0;

                $fuzzyRow[] = min($fuzzy);
            }
            $fuzzyData[] = $fuzzyRow;
        }

        return $this->render('index', [
            'active' => 'inferensi_fuzzy_ko',
            'kota' => $kota,
            'rule' => $rule,
            'output'=> $fuzzyData,
        ]);
    }

    public function actionDefuzzifikasi()
    {
        $rule = RuleKualitasOutput::find()->all();
        $kota = Kota::find()->all();
        $model = NilaiFuzzy::find()
        ->select(['nilai_fuzzy.*', 'kota.nama as nama_kota'])
        ->where(['in', 'indikator', ['AM', 'AL', 'APS', 'AU', 'RIO']])
        ->innerJoin('kota', 'kota.id = nilai_fuzzy.id_kota')
        ->asArray()
        ->all();

        $labelIndikator = [
            1 => 'rendah', 
            2 => 'tinggi', 
            3 => 'sangat_tinggi'];

        foreach ($kota as $key => $kotaItem) {
            $fuzzyPembilang = 0;
            $fuzzyPenyebut = 0;
            foreach ($rule as $key => $ruleItem) {
                $fuzzy = [];

                $fuzzyAm = array_filter($model, function($val, $i) use ($kotaItem) {
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'AM';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyAm) ? array_shift($fuzzyAm)[
                    $labelIndikator[$ruleItem['kriteria_am']]
                ] : 0;
                //---------------------------------------------------
                $fuzzyAl = array_filter($model, function($val, $i) use ($kotaItem){
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'AL';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyAl) ? array_shift($fuzzyAl)[
                    $labelIndikator[$ruleItem['kriteria_al']]
                ] : 0;
                //---------------------------------------------------
                $fuzzyAps = array_filter($model, function($val, $i) use ($kotaItem){
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'APS';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyAps) ? array_shift($fuzzyAps)[
                    $labelIndikator[$ruleItem['kriteria_aps']]
                ] : 0;
                //---------------------------------------------------
                $fuzzyAu = array_filter($model, function($val, $i) use ($kotaItem){
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'AU';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyAu) ? array_shift($fuzzyAu)[
                    $labelIndikator[$ruleItem['kriteria_au']]
                ] : 0;
                //---------------------------------------------------
                $fuzzyRio = array_filter($model, function($val, $i) use ($kotaItem){
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'RIO';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyRio) ? array_shift($fuzzyRio)[
                    $labelIndikator[$ruleItem['kriteria_rio']]
                ] : 0;

                $fuzzyPembilang += $ruleItem['nilai_kualitas_output'] * min($fuzzy);
                $fuzzyPenyebut += min($fuzzy);
            }
            // if($fuzzyPenyebut !== 0) {
            //     $fuzzyData[] = $fuzzyPembilang / $fuzzyPenyebut;
            // }
            $fuzzyData[] = $fuzzyPembilang / $fuzzyPenyebut;
            $model_defuzzifikasi = NilaiDefuzzifikasiTigaVariabel::find()->where(['id_kota'=>$kotaItem->id])->one();
            $model_defuzzifikasi->defuzzifikasi_kualitas_output = $fuzzyPembilang / $fuzzyPenyebut;
            $model_defuzzifikasi->save(false);
        }

        return $this->render('index', [
            'active' => 'defuzzifikasi_ko',
            'kota' => $kota,
            'rule' => $rule,
            'fuzzyData'=> $fuzzyData,
        ]);
    }
}
