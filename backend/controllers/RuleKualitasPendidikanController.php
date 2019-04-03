<?php

namespace backend\controllers;

use Yii;
use backend\models\NilaiDefuzzifikasiTigaVariabel;
use backend\models\RuleKualitasPendidikan;
use backend\models\Indikator;
use backend\models\NilaiFuzzyTigaVariabel;
use backend\models\Kota;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class RuleKualitasPendidikanController extends Controller
{
    public function actionRule()
    {
    	
    	// for ($ap=1; $ap<=3; $ap++){
    	// 	for ($ko=1; $ko<=3; $ko++){
    	// 		for ($tp=1; $tp<=3; $tp++){
	    // 			$model = new RuleKualitasPendidikan();
	    // 			$model->nilai_kualitas_pendidikan = $ap + $ko + $tp;
	    // 			$model->kriteria_angka_partisipasi = $ap;
	    // 			$model->kriteria_kualitas_output = $ko;
	    // 			$model->kriteria_tingkat_pelayanan = $tp;
	    // 			$model->save();
	    // 		}
     //    	}
    	// }
    	$model = RuleKualitasPendidikan::find()->all();

    	return $this->render('index', [
            'active' => 'rule_kp',
            'output'=> $model]);	
    }

    public function actionViewBobot()
    {
        $model = NilaiDefuzzifikasiTigaVariabel::find()
            ->select(['nilai_defuzzifikasi_tiga_variabel.*', 'kota.nama as nama_kota'])
            ->innerJoin('kota', 'kota.id = nilai_defuzzifikasi_tiga_variabel.id_kota')
            ->asArray()
            ->all();

        return $this->render('index', [
            'active' => 'nilaibobot',
            'output'=> $model]);
    }

    public function actionNilaiFuzzyKualitasPendidikan()
    {
        $model = NilaiFuzzyTigaVariabel::find()
        ->select(['nilai_fuzzy_tiga_variabel.*', 'kota.nama as nama_kota'])
        ->where(['in', 'indikator', ['angka_partisipasi', 'tingkat_pelayanan', 'kualitas_output']])
        ->innerJoin('kota', 'kota.id = nilai_fuzzy_tiga_variabel.id_kota')
        ->asArray()
        ->all();
        
        return $this->render('index', [
            'active' => 'fuzzifikasi_kp',
            'output'=> $model]);
    }

    public function actionInferensiFuzzy()
    {
        $rule = RuleKualitasPendidikan::find()->all();
        $kota = Kota::find()->all();
        $model = NilaiFuzzyTigaVariabel::find()
        ->select(['nilai_fuzzy_tiga_variabel.*', 'kota.nama as nama_kota'])
        ->where(['in', 'indikator', ['angka_partisipasi', 'tingkat_pelayanan', 'kualitas_output']])
        ->innerJoin('kota', 'kota.id = nilai_fuzzy_tiga_variabel.id_kota')
        ->asArray()
        ->all();

        $labelIndikator = [
            1 => 'kurang_baik', 
            2 => 'baik', 
            3 => 'sangat_baik'
        ];

        foreach ($rule as $key => $ruleItem) {
            $fuzzyRow = [];
            foreach ($kota as $key => $kotaItem) {
                $fuzzy = [];

                $fuzzyAp = array_filter($model, function($val, $i) use ($kotaItem) {
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'angka_partisipasi';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyAp) ? array_shift($fuzzyAp)[
                    $labelIndikator[$ruleItem['kriteria_angka_partisipasi']]
                ] : 0;
                //--------------------------------------

                $fuzzyTp = array_filter($model, function($val, $i) use ($kotaItem) {
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'tingkat_pelayanan';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyTp) ? array_shift($fuzzyTp)[
                    $labelIndikator[$ruleItem['kriteria_tingkat_pelayanan']]
                ] : 0;

                //-------------------------------------

                $fuzzyKo = array_filter($model, function($val, $i) use ($kotaItem) {
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'kualitas_output';
                }, ARRAY_FILTER_USE_BOTH);
               
                $fuzzy[] = !is_null($fuzzyKo) ? array_shift($fuzzyKo)[
                    $labelIndikator[$ruleItem['kriteria_kualitas_output']]
                ] : 0;

                //==========================================

                $fuzzyRow[] = min($fuzzy);
            }
            $fuzzyData[] = $fuzzyRow;

        }

        return $this->render('index', [
            'active' => 'inferensi_fuzzy_kp',
            'kota' => $kota,
            'rule' => $rule,
            'output'=> $fuzzyData,
        ]);
    }

    public function actionDefuzzifikasi()
    {
        $rule = RuleKualitasPendidikan::find()->all();
        $kota = Kota::find()->all();
        $model = NilaiFuzzyTigaVariabel::find()
        ->select(['nilai_fuzzy_tiga_variabel.*', 'kota.nama as nama_kota'])
        ->where(['in', 'indikator', ['angka_partisipasi', 'tingkat_pelayanan', 'kualitas_output']])
        ->innerJoin('kota', 'kota.id = nilai_fuzzy_tiga_variabel.id_kota')
        ->asArray()
        ->all();

        $labelIndikator = [
            1 => 'kurang_baik', 
            2 => 'baik', 
            3 => 'sangat_baik'
        ];
        foreach ($kota as $key => $kotaItem) {
            $fuzzyPembilang = 0;
            $fuzzyPenyebut = 0;
            foreach ($rule as $key => $ruleItem) {
                $fuzzy = [];

                $fuzzyAp = array_filter($model, function($val, $i) use ($kotaItem) {
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'angka_partisipasi';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyAp) ? array_shift($fuzzyAp)[
                    $labelIndikator[$ruleItem['kriteria_angka_partisipasi']]
                ] : 0;
                //--------------------------------------

                $fuzzyTp = array_filter($model, function($val, $i) use ($kotaItem) {
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'tingkat_pelayanan';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyTp) ? array_shift($fuzzyTp)[
                    $labelIndikator[$ruleItem['kriteria_tingkat_pelayanan']]
                ] : 0;

                //-------------------------------------

                $fuzzyKo = array_filter($model, function($val, $i) use ($kotaItem) {
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'kualitas_output';
                }, ARRAY_FILTER_USE_BOTH);
               
                $fuzzy[] = !is_null($fuzzyKo) ? array_shift($fuzzyKo)[
                    $labelIndikator[$ruleItem['kriteria_kualitas_output']]
                ] : 0;

                //-------------------------------------

                $fuzzyPembilang += $ruleItem['nilai_kualitas_pendidikan'] * min($fuzzy);
                $fuzzyPenyebut += min($fuzzy);
                
            }
            
            $fuzzyData[] = $fuzzyPembilang / $fuzzyPenyebut ;
        }
       // var_dump($fuzzyData);

        return $this->render('index', [
            'active' => 'defuzzifikasi_kp',
            'kota' => $kota,
            'rule' => $rule,
            'fuzzyData' => $fuzzyData,
        ]);

    }

}