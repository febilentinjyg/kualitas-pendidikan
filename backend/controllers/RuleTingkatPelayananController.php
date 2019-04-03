<?php

namespace backend\controllers;

use Yii;
use backend\models\NilaiDefuzzifikasiTigaVariabel;
use backend\models\RuleTingkatPelayanan;
use backend\models\Indikator;
use backend\models\Kota;
USE backend\models\NilaiFuzzy;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class RuleTingkatPelayananController extends Controller
{
    public function actionRule()
    {
    	
    // 	for ($rmg=1; $rmg<=3; $rmg++){
    // 		for ($rms=1; $rms<=3; $rms++){
    // 			for ($rmk=1; $rmk<=3; $rmk++){
    // 				for ($rkrk=1; $rkrk<=3; $rkrk++){
    // 					for ($prkb=1; $prkb<=3; $prkb++){
    // 						for ($pglm=1; $pglm<=3; $pglm++){
				//     			$model = new RuleTingkatPelayanan();
				//     			$nilai = $rmg + $rms + $rmk + $rkrk + $prkb + $pglm;
				//     			$model->kriteria_rmg = $rmg;
				//     			$model->kriteria_rms = $rms;
				//     			$model->kriteria_rmk = $rmk;
				//     			$model->kriteria_rkrk = $rkrk;
				//     			$model->kriteria_prkb = $prkb;
				//     			$model->kriteria_pglm = $pglm;
				//     			$model->nilai_tingkat_pelayanan = $nilai;
				//     			$model->save();
				//     		}
				//     	}
				//     }
				// }
    //     	}
    // 	}
    $model = RuleTingkatPelayanan::find()->all();	
    return $this->render('index', [
    	'active' => 'rule_tp',
    	'output' => $model]);
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

    public function actionNilaiFuzzyTingkatPelayanan()
    {
        $model = NilaiFuzzy::find()
        ->select(['nilai_fuzzy.*', 'kota.nama as nama_kota'])
        ->where(['in', 'indikator', ['RMG', 'RMS', 'RMK', 'RKRK', 'PRKB', 'PGLM']])
        ->innerJoin('kota', 'kota.id = nilai_fuzzy.id_kota')
        ->asArray()
        ->all();
        
        return $this->render('index',[
            'active' => 'fuzzifikasi_tp',
            'output' => $model,
        ]);
    }

    public function actionInferensiFuzzy()
    {
        $rule = RuleTingkatPelayanan::find()->all();
        $kota = Kota::find()->all();
        $model = NilaiFuzzy::find()
        ->select(['nilai_fuzzy.*', 'kota.nama as nama_kota'])
        ->where(['in', 'indikator', ['RMG', 'RMS', 'RMK', 'RKRK', 'PRKB', 'PGLM']])
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

                $fuzzyRmg = array_filter($model, function($val, $i) use ($kotaItem) {
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'RMG';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyRmg) ? array_shift($fuzzyRmg)[
                    $labelIndikator[$ruleItem['kriteria_rmg']]
                ] : 0;
                //---------------------------------------------------
                $fuzzyRms = array_filter($model, function($val, $i) use ($kotaItem){
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'RMS';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyRms) ? array_shift($fuzzyRms)[
                    $labelIndikator[$ruleItem['kriteria_rms']]
                ] : 0;
                //---------------------------------------------------
                $fuzzyRmk = array_filter($model, function($val, $i) use ($kotaItem){
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'RMK';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyRmk) ? array_shift($fuzzyRmk)[
                    $labelIndikator[$ruleItem['kriteria_rmk']]
                ] : 0;
                //---------------------------------------------------
                $fuzzyRkrk = array_filter($model, function($val, $i) use ($kotaItem){
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'RKRK';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyRkrk) ? array_shift($fuzzyRkrk)[
                    $labelIndikator[$ruleItem['kriteria_rkrk']]
                ] : 0;
                //---------------------------------------------------
                $fuzzyPrkb = array_filter($model, function($val, $i) use ($kotaItem){
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'PRKB';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyPrkb) ? array_shift($fuzzyPrkb)[
                    $labelIndikator[$ruleItem['kriteria_prkb']]
                ] : 0;
                //---------------------------------------------------
                $fuzzyPglm = array_filter($model, function($val, $i) use ($kotaItem){
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'PGLM';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyPglm) ? array_shift($fuzzyPglm)[
                    $labelIndikator[$ruleItem['kriteria_pglm']]
                ] : 0;

                $fuzzyRow[] = min($fuzzy);
            }
            $fuzzyData[] = $fuzzyRow;
        }

        return $this->render('index', [
            'active' => 'inferensi_fuzzy_tp',
            'kota' => $kota,
            'rule' => $rule,
            'output'=> $fuzzyData,
        ]);
    }

    public function actionDefuzzifikasi()
    {
        $rule = RuleTingkatPelayanan::find()->all();
        $kota = Kota::find()->all();
        $model = NilaiFuzzy::find()
        ->select(['nilai_fuzzy.*', 'kota.nama as nama_kota'])
        ->where(['in', 'indikator', ['RMG', 'RMS', 'RMK', 'RKRK', 'PRKB', 'PGLM']])
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

                $fuzzyRmg = array_filter($model, function($val, $i) use ($kotaItem) {
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'RMG';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyRmg) ? array_shift($fuzzyRmg)[
                    $labelIndikator[$ruleItem['kriteria_rmg']]
                ] : 0;
                //---------------------------------------------------
                $fuzzyRms = array_filter($model, function($val, $i) use ($kotaItem){
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'RMS';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyRms) ? array_shift($fuzzyRms)[
                    $labelIndikator[$ruleItem['kriteria_rms']]
                ] : 0;
                //---------------------------------------------------
                $fuzzyRmk = array_filter($model, function($val, $i) use ($kotaItem){
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'RMK';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyRmk) ? array_shift($fuzzyRmk)[
                    $labelIndikator[$ruleItem['kriteria_rmk']]
                ] : 0;
                //---------------------------------------------------
                $fuzzyRkrk = array_filter($model, function($val, $i) use ($kotaItem){
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'RKRK';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyRkrk) ? array_shift($fuzzyRkrk)[
                    $labelIndikator[$ruleItem['kriteria_rkrk']]
                ] : 0;
                //---------------------------------------------------
                $fuzzyPrkb = array_filter($model, function($val, $i) use ($kotaItem){
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'PRKB';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyPrkb) ? array_shift($fuzzyPrkb)[
                    $labelIndikator[$ruleItem['kriteria_prkb']]
                ] : 0;
                //---------------------------------------------------
                $fuzzyPglm = array_filter($model, function($val, $i) use ($kotaItem){
                    return $val['id_kota'] == $kotaItem->id && $val['indikator'] == 'PGLM';
                }, ARRAY_FILTER_USE_BOTH);

                $fuzzy[] = !is_null($fuzzyPglm) ? array_shift($fuzzyPglm)[
                    $labelIndikator[$ruleItem['kriteria_pglm']]
                ] : 0;

                $fuzzyPembilang += $ruleItem['nilai_tingkat_pelayanan'] * min($fuzzy);
                $fuzzyPenyebut += min($fuzzy);
            }
            $fuzzyData[] = $fuzzyPembilang / $fuzzyPenyebut;
            $model_defuzzifikasi = NilaiDefuzzifikasiTigaVariabel::find()->where(['id_kota'=>$kotaItem->id])->one();
            $model_defuzzifikasi->defuzzifikasi_tingkat_pelayanan = $fuzzyPembilang / $fuzzyPenyebut;
            $model_defuzzifikasi->save(false);
        }

        return $this->render('index', [
            'active' => 'defuzzifikasi_tp',
            'kota' => $kota,
            'rule' => $rule,
            'fuzzyData'=> $fuzzyData,
        ]);
    }


}
