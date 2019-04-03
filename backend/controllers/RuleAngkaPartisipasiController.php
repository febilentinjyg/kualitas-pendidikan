<?php

namespace backend\controllers;

use Yii;
use backend\models\NilaiDefuzzifikasiTigaVariabel;
use backend\models\RuleAngkaPartisipasi;
use backend\models\Indikator;
use backend\models\NilaiFuzzy;
use backend\models\Kota;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class RuleAngkaPartisipasiController extends Controller
{
    public function actionRule()
    {
    	
    	// for ($apk=1; $apk<=3; $apk++){
    	// 		for ($apm=1; $apm<=3; $apm++){
    	// 		$model = new RuleAngkaPartisipasi();
    	// 		$nilai = $apk + $apm ;
    	// 		$model->kriteria_apk = $apk;
    	// 		$model->kriteria_apm = $apm;
    	// 		$model->nilai_angka_partisipasi = $nilai;
    	// 		$model->save();
     //    	}
    	// }
    	$model = RuleAngkaPartisipasi::find()->all();

    	return $this->render('index', [
            'active' => 'rule_ap',
            'output'=> $model]);	
    }

    public function actionViewBobot()
    {
        $model = Indikator::find()
            ->select(['indikator.*', 'kota.nama as nama_kota'])
            ->innerJoin('variabel_kota', 'variabel_kota.id = indikator.id_varkota')
            ->innerJoin('kota', 'kota.id = variabel_kota.id_kota')
            ->asArray()
            ->all();

        return $this->render('index', [
            'active' => 'nilaibobot',
            'output'=> $model]);
    }

    public function actionNilaiFuzzyAngkaPartisipasi()
    {
        $model = NilaiFuzzy::find()
        ->select(['nilai_fuzzy.*', 'kota.nama as nama_kota'])
        ->where(['in', 'indikator', ['APK', 'APM']])
        ->innerJoin('kota', 'kota.id = nilai_fuzzy.id_kota')
        ->asArray()
        ->all();
        
        return $this->render('index', [
            'active' => 'fuzzifikasi_ap',
            'output'=> $model]);
    }

    public function actionInferensiFuzzy()
    {
        $rule = RuleAngkaPartisipasi::find()->all();
        $kota = Kota::find()->all();
        $model = NilaiFuzzy::find()
        ->select(['nilai_fuzzy.*', 'kota.nama as nama_kota'])
        ->where(['in', 'indikator', ['APK', 'APM']])
        ->innerJoin('kota', 'kota.id = nilai_fuzzy.id_kota')
        ->asArray()
        ->all();

        $labelIndikator = [
            1 => 'rendah', 
            2 => 'tinggi', 
            3 => 'sangat_tinggi'
        ];

        foreach ($rule as $key => $ruleItem) {
            $fuzzyRow = [];
            foreach ($kota as $key => $kotaItem) {
                $fuzzy = [];

                $fuzzyApk = array_filter($model, function($val, $i) use ($kotaItem) {
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'APK';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyApk) ? array_shift($fuzzyApk)[
                    $labelIndikator[$ruleItem['kriteria_apk']]
                ] : 0;

                $fuzzyApm = array_filter($model, function($val, $i) use ($kotaItem){
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'APM';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyApm) ? array_shift($fuzzyApm)[
                    $labelIndikator[$ruleItem['kriteria_apm']]
                ] : 0;

                $fuzzyRow[] = min($fuzzy);
            }
            $fuzzyData[] = $fuzzyRow;
        }
        return $this->render('index', [
            'active' => 'inferensi_fuzzy_ap',
            'kota' => $kota,
            'rule' => $rule,
            'output'=> $fuzzyData,
        ]);
    }

    public function actionDefuzzifikasi()
    {
        $rule = RuleAngkaPartisipasi::find()->all();
        $kota = Kota::find()->all();
        $model = NilaiFuzzy::find()
        ->select(['nilai_fuzzy.*', 'kota.nama as nama_kota'])
        ->where(['in', 'indikator', ['APK', 'APM']])
        ->innerJoin('kota', 'kota.id = nilai_fuzzy.id_kota')
        ->asArray()
        ->all();

        $labelIndikator = [
            1 => 'rendah',
            2 =>  'tinggi',
            3 => 'sangat_tinggi'];

        foreach ($kota as $key => $kotaItem) {
            $fuzzyPembilang = 0;
            $fuzzyPenyebut = 0;
            foreach ($rule as $key => $ruleItem) {
                $fuzzy = [];

                $fuzzyApk = array_filter($model, function($val, $i) use ($kotaItem) {
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'APK';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyApk) ? array_shift($fuzzyApk)[
                    $labelIndikator[$ruleItem['kriteria_apk']]
                ] : 0;

                $fuzzyApm = array_filter($model, function($val, $i) use ($kotaItem){
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'APM';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyApm) ? array_shift($fuzzyApm)[
                    $labelIndikator[$ruleItem['kriteria_apm']]
                ] : 0;

                $fuzzyPembilang += $ruleItem['nilai_angka_partisipasi'] * min($fuzzy);
                $fuzzyPenyebut += min($fuzzy);
            }
            $fuzzyData[] = $fuzzyPembilang / $fuzzyPenyebut;
            $model_defuzzifikasi = NilaiDefuzzifikasiTigaVariabel::find()->where(['id_kota'=>$kotaItem->id])->one();
            $model_defuzzifikasi->defuzzifikasi_angka_partisipasi = $fuzzyPembilang / $fuzzyPenyebut;
            $model_defuzzifikasi->save(false);

        }



        return $this->render('index', [
            'active' => 'defuzzifikasi_ap',
            'kota' => $kota,
            'rule' => $rule,
            'fuzzyData' => $fuzzyData,
        ]);

    }

}
