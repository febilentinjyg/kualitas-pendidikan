<?php

namespace backend\controllers;

use backend\models\RuleKualitasPendidikan;
use backend\models\RuleAngkaPartisipasi;
use backend\models\RuleTingkatPelayanan;
use backend\models\RuleKualitasOutput;
use backend\models\NilaiFuzzy;
use backend\models\NilaiFuzzyTigaVariabel;
use backend\models\NilaiDefuzzifikasiTigaVariabel;
use backend\models\Kota;

class ApiController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionKualitasPendidikan()
    {
    	// \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

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
            $fuzzyData[] = array_merge($kotaItem->attributes, ['value' => $fuzzyPembilang / $fuzzyPenyebut]);
        }
        return json_encode($fuzzyData);
    }
//-----------------------------------------------------------------------------------------------------------

    public function actionAngkaPartisipasi()
    {
        $model = NilaiDefuzzifikasiTigaVariabel::find()
            ->select(['id_kota as id', 'nilai_defuzzifikasi_tiga_variabel.defuzzifikasi_angka_partisipasi as value', 'kota.nama as nama'])
            ->innerJoin('kota', 'kota.id = nilai_defuzzifikasi_tiga_variabel.id_kota')
            ->asArray()
            ->all();

        return json_encode($model);
    }

//-----------------------------------------------------------------------------------------------------------
    public function actionTingkatPelayanan()
    {
        $model = NilaiDefuzzifikasiTigaVariabel::find()
            ->select(['id_kota as id', 'nilai_defuzzifikasi_tiga_variabel.defuzzifikasi_tingkat_pelayanan as value', 'kota.nama as nama'])
            ->innerJoin('kota', 'kota.id = nilai_defuzzifikasi_tiga_variabel.id_kota')
            ->asArray()
            ->all();
            
        return json_encode($model);
    }

//----------------------------------------------------------------------------------------------------------
    public function actionKualitasOutput()
    {
        $model = NilaiDefuzzifikasiTigaVariabel::find()
            ->select(['id_kota as id', 'nilai_defuzzifikasi_tiga_variabel.defuzzifikasi_kualitas_output as value', 'kota.nama as nama'])
            ->innerJoin('kota', 'kota.id = nilai_defuzzifikasi_tiga_variabel.id_kota')
            ->asArray()
            ->all();
            
        return json_encode($model);
    }
}
