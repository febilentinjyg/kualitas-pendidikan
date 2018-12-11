<?php
namespace backend\controllers;


use Yii;
use backend\models\Indikator;
use backend\models\IndikatorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class CreateFuzzyController extends Controller{

	public function actionFuzzy(){
		  // return $this->render('fuzzy');

		  $searchModelApk = new IndikatorSearch();
          $nilai_min = $searchModelApk->cariMinApk();
          $nilai_max = $searchModelApk->cariMaxApk();

          $bagi = ($nilai_max - $nilai_min) / 3;
          $batas1 = ($nilai_min + $bagi);
          $batas2 = ($nilai_min + (2*$bagi));
          $kategoriTmp = [];
          $i = 0;
          $kota = $searchModelApk->ambilNilaiApk();
          foreach ($kota as $key => $value) {
          	if($value['apk'] < $nilai_min)
          		$kategoriapk[$i] = "R";
          	elseif ($value['apk'] > $nilai_min && $value['apk'] < $batas1) {
          	 	$baik = ($value['apk'] - $nilai_min) / ($batas1 - $nilai_min);
              $kurangbaik = ($batas1 - $value['apk']) / ($batas1 - $nilai_min);
              $kategoriapk[$i] = number_format($kurangbaik,3)." R & ".number_format($baik,3)." T";
          	 }
          	elseif ($value['apk'] >= $batas1 && $value['apk'] <= $batas2) {
          	 	$kategoriapk[$i] = "T";
          	 }
          	elseif ($value['apk'] > $batas2 && $value['apk'] < $nilai_max) {
              $baik = ($nilai_max - $value['apk']) / ($nilai_max - $batas2);
              $sangatbaik = ($value['apk'] - $batas2) / ($nilai_max - $batas2);
          	 	$kategoriapk[$i] = number_format($baik,3)." T & ".number_format($sangatbaik,3)." ST";
          	 }
          	elseif ($value['apk'] > $nilai_max){
          		$kategoriapk[$i] = "ST";
          	 }
          	else
          		$kategoriapk[$i] = "ERROR";
          	$i++;
          	}


    $searchModelApm = new IndikatorSearch();
          $nilai_min = $searchModelApm->cariMinApm();
          $nilai_max = $searchModelApm->cariMaxApm();

          $bagi = ($nilai_max - $nilai_min) / 3;
          $batas1 = ($nilai_min + $bagi);
          $batas2 = ($nilai_min + (2*$bagi));
          $kategoriTmp = [];
          $i = 0;
          $kota = $searchModelApm->ambilNilaiApm();
          foreach ($kota as $key => $value) {
            if($value['apm'] < $nilai_min)
              $kategoriapm[$i] = "R";
            elseif ($value['apm'] > $nilai_min && $value['apm'] < $batas1) {
              $baik = ($value['apm'] - $nilai_min) / ($batas1 - $nilai_min);
              $kurangbaik = ($batas1 - $value['apm']) / ($batas1 - $nilai_min);
              $kategoriapm[$i] = number_format($kurangbaik,3)." R & ".number_format($baik,3)." T";
             }
            elseif ($value['apm'] >= $batas1 && $value['apm'] <= $batas2) {
              $kategoriapm[$i] = "T";
             }
            elseif ($value['apm'] > $batas2 && $value['apm'] < $nilai_max) {
              $baik = ($nilai_max - $value['apm']) / ($nilai_max - $batas2);
              $sangatbaik = ($value['apm'] - $batas2) / ($nilai_max - $batas2);
              $kategoriapm[$i] = number_format($baik,3)." T & ".number_format($sangatbaik,3)." ST";
             }
            elseif ($value['apm'] > $nilai_max){
              $kategoriapm[$i] = "ST";
             }
            else
              $kategoriapm[$i] = "ERROR";

            $i++;
            }

      $searchModelTps = new IndikatorSearch();
          $nilai_min = $searchModelTps->cariMinTps();
          $nilai_max = $searchModelTps->cariMaxTps();

          $bagi = ($nilai_max - $nilai_min) / 3;
          $batas1 = ($nilai_min + $bagi);
          $batas2 = ($nilai_min + (2*$bagi));
          $kategoriTmp = [];
          $i = 0;
          $kota = $searchModelTps->ambilNilaiTps();
          foreach ($kota as $key => $value) {
            if($value['tps'] < $nilai_min)
              $kategoritps[$i] = "R";
            elseif ($value['tps'] > $nilai_min && $value['tps'] < $batas1) {
              $baik = ($value['tps'] - $nilai_min) / ($batas1 - $nilai_min);
              $kurangbaik = ($batas1 - $value['tps']) / ($batas1 - $nilai_min);
              $kategoritps[$i] = number_format($kurangbaik,3)." R & ".number_format($baik,3)." T";
             }
            elseif ($value['tps'] >= $batas1 && $value['tps'] <= $batas2) {
              $kategoritps[$i] = "T";
             }
            elseif ($value['tps'] > $batas2 && $value['tps'] < $nilai_max) {
              $baik = ($nilai_max - $value['tps']) / ($nilai_max - $batas2);
              $sangatbaik = ($value['tps'] - $batas2) / ($nilai_max - $batas2);
              $kategoritps[$i] = number_format($baik,3)." T & ".number_format($sangatbaik,3)." ST";
             }
            elseif ($value['tps'] > $nilai_max){
              $kategoritps[$i] = "ST";
             }
            else
              $kategoritps[$i] = "ERROR";

            $i++;
            }

        $searchModelRmg = new IndikatorSearch();
          $nilai_min = $searchModelRmg->cariMinRmg();
          $nilai_max = $searchModelRmg->cariMaxRmg();

          $bagi = ($nilai_max - $nilai_min) / 3;
          $batas1 = ($nilai_min + $bagi);
          $batas2 = ($nilai_min + (2*$bagi));
          $kategoriTmp = [];
          $i = 0;
          $kota = $searchModelRmg->ambilNilaiRmg();
          foreach ($kota as $key => $value) {
            if($value['rmg'] < $nilai_min)
              $kategorirmg[$i] = "R";
            elseif ($value['rmg'] > $nilai_min && $value['rmg'] < $batas1) {
              $baik = ($value['rmg'] - $nilai_min) / ($batas1 - $nilai_min);
              $kurangbaik = ($batas1 - $value['rmg']) / ($batas1 - $nilai_min);
              $kategorirmg[$i] = number_format($kurangbaik,3)." R & ".number_format($baik,3)." T";
             }
            elseif ($value['rmg'] >= $batas1 && $value['rmg'] <= $batas2) {
              $kategorirmg[$i] = "T";
             }
            elseif ($value['rmg'] > $batas2 && $value['rmg'] < $nilai_max) {
              $baik = ($nilai_max - $value['rmg']) / ($nilai_max - $batas2);
              $sangatbaik = ($value['rmg'] - $batas2) / ($nilai_max - $batas2);
              $kategorirmg[$i] = number_format($baik,3)." T & ".number_format($sangatbaik,3)." ST";
             }
            elseif ($value['rmg'] > $nilai_max){
              $kategorirmg[$i] = "ST";
             }
            else
              $kategorirmg[$i] = "ERROR";

            $i++;
            }

          $searchModelRms = new IndikatorSearch();
          $nilai_min = $searchModelRms->cariMinRms();
          $nilai_max = $searchModelRms->cariMaxRms();

          $bagi = ($nilai_max - $nilai_min) / 3;
          $batas1 = ($nilai_min + $bagi);
          $batas2 = ($nilai_min + (2*$bagi));
          $kategoriTmp = [];
          $i = 0;
          $kota = $searchModelRms->ambilNilaiRms();
          foreach ($kota as $key => $value) {
            if($value['rms'] < $nilai_min)
              $kategorirms[$i] = "R";
            elseif ($value['rms'] > $nilai_min && $value['rms'] < $batas1) {
              $baik = ($value['rms'] - $nilai_min) / ($batas1 - $nilai_min);
              $kurangbaik = ($batas1 - $value['rms']) / ($batas1 - $nilai_min);
              $kategorirms[$i] = number_format($kurangbaik,3)." R & ".number_format($baik,3)." T";
             }
            elseif ($value['rms'] >= $batas1 && $value['rms'] <= $batas2) {
              $kategorirms[$i] = "T";
             }
            elseif ($value['rms'] > $batas2 && $value['rms'] < $nilai_max) {
              $baik = ($nilai_max - $value['rms']) / ($nilai_max - $batas2);
              $sangatbaik = ($value['rms'] - $batas2) / ($nilai_max - $batas2);
              $kategorirms[$i] = number_format($baik,3)." T & ".number_format($sangatbaik,3)." ST";
             }
            elseif ($value['rms'] > $nilai_max){
              $kategorirms[$i] = "ST";
             }
            else
              $kategorirms[$i] = "ERROR";

            $i++;
            }

          $searchModelRmk = new IndikatorSearch();
          $nilai_min = $searchModelRmk->cariMinRmk();
          $nilai_max = $searchModelRmk->cariMaxRmk();

          $bagi = ($nilai_max - $nilai_min) / 3;
          $batas1 = ($nilai_min + $bagi);
          $batas2 = ($nilai_min + (2*$bagi));
          $kategoriTmp = [];
          $i = 0;
          $kota = $searchModelRmk->ambilNilaiRmk();
          foreach ($kota as $key => $value) {
            if($value['rmk'] < $nilai_min)
              $kategorirmk[$i] = "R";
            elseif ($value['rmk'] > $nilai_min && $value['rmk'] < $batas1) {
              $baik = ($value['rmk'] - $nilai_min) / ($batas1 - $nilai_min);
              $kurangbaik = ($batas1 - $value['rmk']) / ($batas1 - $nilai_min);
              $kategorirmk[$i] = number_format($kurangbaik,3)." R & ".number_format($baik,3)." T";
             }
            elseif ($value['rmk'] >= $batas1 && $value['rmk'] <= $batas2) {
              $kategorirmk[$i] = "T";
             }
            elseif ($value['rmk'] > $batas2 && $value['rmk'] < $nilai_max) {
              $baik = ($nilai_max - $value['rmk']) / ($nilai_max - $batas2);
              $sangatbaik = ($value['rmk'] - $batas2) / ($nilai_max - $batas2);
              $kategorirmk[$i] = number_format($baik,3)." T & ".number_format($sangatbaik,3)." ST";
             }
            elseif ($value['rmk'] > $nilai_max){
              $kategorirmk[$i] = "ST";
             }
            else
              $kategorirmk[$i] = "ERROR";

            $i++;
            }

          $searchModelRkrk = new IndikatorSearch();
          $nilai_min = $searchModelRkrk->cariMinRkrk();
          $nilai_max = $searchModelRkrk->cariMaxRkrk();

          $bagi = ($nilai_max - $nilai_min) / 3;
          $batas1 = ($nilai_min + $bagi);
          $batas2 = ($nilai_min + (2*$bagi));
          $kategoriTmp = [];
          $i = 0;
          $kota = $searchModelRkrk->ambilNilaiRkrk();
          foreach ($kota as $key => $value) {
            if($value['rkrk'] < $nilai_min)
              $kategorirkrk[$i] = "R";
            elseif ($value['rkrk'] > $nilai_min && $value['rkrk'] < $batas1) {
              $baik = ($value['rkrk'] - $nilai_min) / ($batas1 - $nilai_min);
              $kurangbaik = ($batas1 - $value['rkrk']) / ($batas1 - $nilai_min);
              $kategorirkrk[$i] = number_format($kurangbaik,3)." R & ".number_format($baik,3)." T";
             }
            elseif ($value['rkrk'] >= $batas1 && $value['rkrk'] <= $batas2) {
              $kategorirkrk[$i] = "T";
             }
            elseif ($value['rkrk'] > $batas2 && $value['rkrk'] < $nilai_max) {
              $baik = ($nilai_max - $value['rkrk']) / ($nilai_max - $batas2);
              $sangatbaik = ($value['rkrk'] - $batas2) / ($nilai_max - $batas2);
              $kategorirkrk[$i] = number_format($baik,3)." T & ".number_format($sangatbaik,3)." ST";
             }
            elseif ($value['rkrk'] > $nilai_max){
              $kategorirkrk[$i] = "ST";
             }
            else
              $kategorirkrk[$i] = "ERROR";

            $i++;
            }

          $searchModelPrkb = new IndikatorSearch();
          $nilai_min = $searchModelPrkb->cariMinPrkb();
          $nilai_max = $searchModelPrkb->cariMaxPrkb();

          $bagi = ($nilai_max - $nilai_min) / 3;
          $batas1 = ($nilai_min + $bagi);
          $batas2 = ($nilai_min + (2*$bagi));
          $kategoriTmp = [];
          $i = 0;
          $kota = $searchModelPrkb->ambilNilaiPrkb();
          foreach ($kota as $key => $value) {
            if($value['prkb'] < $nilai_min)
              $kategoriprkb[$i] = "R";
            elseif ($value['prkb'] > $nilai_min && $value['prkb'] < $batas1) {
              $baik = ($value['prkb'] - $nilai_min) / ($batas1 - $nilai_min);
              $kurangbaik = ($batas1 - $value['prkb']) / ($batas1 - $nilai_min);
              $kategoriprkb[$i] = number_format($kurangbaik,3)." R & ".number_format($baik,3)." T";
             }
            elseif ($value['prkb'] >= $batas1 && $value['prkb'] <= $batas2) {
              $kategoriprkb[$i] = "T";
             }
            elseif ($value['prkb'] > $batas2 && $value['prkb'] < $nilai_max) {
              $baik = ($nilai_max - $value['prkb']) / ($nilai_max - $batas2);
              $sangatbaik = ($value['prkb'] - $batas2) / ($nilai_max - $batas2);
              $kategoriprkb[$i] = number_format($baik,3)." T & ".number_format($sangatbaik,3)." ST";
             }
            elseif ($value['prkb'] > $nilai_max){
              $kategoriprkb[$i] = "ST";
             }
            else
              $kategoriprkb[$i] = "ERROR";

            $i++;
            }

          $searchModelPglm = new IndikatorSearch();
          $nilai_min = $searchModelPglm->cariMinPglm();
          $nilai_max = $searchModelPglm->cariMaxPglm();

          $bagi = ($nilai_max - $nilai_min) / 3;
          $batas1 = ($nilai_min + $bagi);
          $batas2 = ($nilai_min + (2*$bagi));
          $kategoriTmp = [];
          $i = 0;
          $kota = $searchModelPglm->ambilNilaiPglm();
          foreach ($kota as $key => $value) {
            if($value['pglm'] < $nilai_min)
              $kategoripglm[$i] = "R";
            elseif ($value['pglm'] > $nilai_min && $value['pglm'] < $batas1) {
              $baik = ($value['pglm'] - $nilai_min) / ($batas1 - $nilai_min);
              $kurangbaik = ($batas1 - $value['pglm']) / ($batas1 - $nilai_min);
              $kategoripglm[$i] = number_format($kurangbaik,3)." R & ".number_format($baik,3)." T";
             }
            elseif ($value['pglm'] >= $batas1 && $value['pglm'] <= $batas2) {
              $kategoripglm[$i] = "T";
             }
            elseif ($value['pglm'] > $batas2 && $value['pglm'] < $nilai_max) {
              $baik = ($nilai_max - $value['pglm']) / ($nilai_max - $batas2);
              $sangatbaik = ($value['pglm'] - $batas2) / ($nilai_max - $batas2);
              $kategoripglm[$i] = number_format($baik,3)." T & ".number_format($sangatbaik,3)." ST";
             }
            elseif ($value['pglm'] > $nilai_max){
              $kategoripglm[$i] = "ST";
             }
            else
              $kategoripglm[$i] = "ERROR";

            $i++;
            }

          $searchModelAm = new IndikatorSearch();
          $nilai_min = $searchModelAm->cariMinAm();
          $nilai_max = $searchModelAm->cariMaxAm();

          $bagi = ($nilai_max - $nilai_min) / 3;
          $batas1 = ($nilai_min + $bagi);
          $batas2 = ($nilai_min + (2*$bagi));
          $kategoriTmp = [];
          $i = 0;
          $kota = $searchModelAm->ambilNilaiAm();
          foreach ($kota as $key => $value) {
            if($value['am'] < $nilai_min)
              $kategoriam[$i] = "R";
            elseif ($value['am'] > $nilai_min && $value['am'] < $batas1) {
              $baik = ($value['am'] - $nilai_min) / ($batas1 - $nilai_min);
              $kurangbaik = ($batas1 - $value['am']) / ($batas1 - $nilai_min);
              $kategoriam[$i] = number_format($kurangbaik,3)." R & ".number_format($baik,3)." T";
             }
            elseif ($value['am'] >= $batas1 && $value['am'] <= $batas2) {
              $kategoriam[$i] = "T";
             }
            elseif ($value['am'] > $batas2 && $value['am'] < $nilai_max) {
              $baik = ($nilai_max - $value['am']) / ($nilai_max - $batas2);
              $sangatbaik = ($value['am'] - $batas2) / ($nilai_max - $batas2);
              $kategoriam[$i] = number_format($baik,3)." T & ".number_format($sangatbaik,3)." ST";
             }
            elseif ($value['am'] > $nilai_max){
              $kategoriam[$i] = "ST";
             }
            else
              $kategoriam[$i] = "ERROR";

            $i++;
            }

          $searchModelAl = new IndikatorSearch();
          $nilai_min = $searchModelAl->cariMinAl();
          $nilai_max = $searchModelAl->cariMaxAl();

          $bagi = ($nilai_max - $nilai_min) / 3;
          $batas1 = ($nilai_min + $bagi);
          $batas2 = ($nilai_min + (2*$bagi));
          $kategoriTmp = [];
          $i = 0;
          $kota = $searchModelAl->ambilNilaiAl();
          foreach ($kota as $key => $value) {
            if($value['al'] < $nilai_min)
              $kategorial[$i] = "R";
            elseif ($value['al'] > $nilai_min && $value['al'] < $batas1) {
              $baik = ($value['al'] - $nilai_min) / ($batas1 - $nilai_min);
              $kurangbaik = ($batas1 - $value['al']) / ($batas1 - $nilai_min);
              $kategorial[$i] = number_format($kurangbaik,3)." R & ".number_format($baik,3)." T";
             }
            elseif ($value['al'] >= $batas1 && $value['al'] <= $batas2) {
              $kategorial[$i] = "T";
             }
            elseif ($value['al'] > $batas2 && $value['al'] < $nilai_max) {
              $baik = ($nilai_max - $value['al']) / ($nilai_max - $batas2);
              $sangatbaik = ($value['al'] - $batas2) / ($nilai_max - $batas2);
              $kategorial[$i] = number_format($baik,3)." T & ".number_format($sangatbaik,3)." ST";
             }
            elseif ($value['al'] > $nilai_max){
              $kategorial[$i] = "ST";
             }
            else
              $kategorial[$i] = "ERROR";

            $i++;
            }

          $searchModelAps = new IndikatorSearch();
          $nilai_min = $searchModelAps->cariMinAps();
          $nilai_max = $searchModelAps->cariMaxAps();

          $bagi = ($nilai_max - $nilai_min) / 3;
          $batas1 = ($nilai_min + $bagi);
          $batas2 = ($nilai_min + (2*$bagi));
          $kategoriTmp = [];
          $i = 0;
          $kota = $searchModelAps->ambilNilaiAps();
          foreach ($kota as $key => $value) {
            if($value['aps'] < $nilai_min)
              $kategoriaps[$i] = "R";
            elseif ($value['aps'] > $nilai_min && $value['aps'] < $batas1) {
              $baik = ($value['aps'] - $nilai_min) / ($batas1 - $nilai_min);
              $kurangbaik = ($batas1 - $value['aps']) / ($batas1 - $nilai_min);
              $kategoriaps[$i] = number_format($kurangbaik,3)." R & ".number_format($baik,3)." T";
             }
            elseif ($value['aps'] >= $batas1 && $value['aps'] <= $batas2) {
              $kategoriaps[$i] = "T";
             }
            elseif ($value['aps'] > $batas2 && $value['aps'] < $nilai_max) {
              $baik = ($nilai_max - $value['aps']) / ($nilai_max - $batas2);
              $sangatbaik = ($value['aps'] - $batas2) / ($nilai_max - $batas2);
              $kategoriaps[$i] = number_format($baik,3)." T & ".number_format($sangatbaik,3)." ST";
             }
            elseif ($value['aps'] > $nilai_max){
              $kategoriaps[$i] = "ST";
             }
            else
              $kategoriaps[$i] = "ERROR";

            $i++;
            }

          $searchModelAu = new IndikatorSearch();
          $nilai_min = $searchModelAu->cariMinAu();
          $nilai_max = $searchModelAu->cariMaxAu();

          $bagi = ($nilai_max - $nilai_min) / 3;
          $batas1 = ($nilai_min + $bagi);
          $batas2 = ($nilai_min + (2*$bagi));
          $kategoriTmp = [];
          $i = 0;
          $kota = $searchModelAu->ambilNilaiAu();
          foreach ($kota as $key => $value) {
            if($value['au'] < $nilai_min)
              $kategoriau[$i] = "R";
            elseif ($value['au'] > $nilai_min && $value['au'] < $batas1) {
              $baik = ($value['au'] - $nilai_min) / ($batas1 - $nilai_min);
              $kurangbaik = ($batas1 - $value['au']) / ($batas1 - $nilai_min);
              $kategoriau[$i] = number_format($kurangbaik,3)." R & ".number_format($baik,3)." T";
             }
            elseif ($value['au'] >= $batas1 && $value['au'] <= $batas2) {
              $kategoriau[$i] = "T";
             }
            elseif ($value['au'] > $batas2 && $value['au'] < $nilai_max) {
              $baik = ($nilai_max - $value['au']) / ($nilai_max - $batas2);
              $sangatbaik = ($value['au'] - $batas2) / ($nilai_max - $batas2);
              $kategoriau[$i] = number_format($baik,3)." T & ".number_format($sangatbaik,3)." ST";
             }
            elseif ($value['au'] > $nilai_max){
              $kategoriau[$i] = "ST";
             }
            else
              $kategoriau[$i] = "ERROR";

            $i++;
            }

          $searchModelRio = new IndikatorSearch();
          $nilai_min = $searchModelRio->cariMinRio();
          $nilai_max = $searchModelRio->cariMaxRio();

          $bagi = ($nilai_max - $nilai_min) / 3;
          $batas1 = ($nilai_min + $bagi);
          $batas2 = ($nilai_min + (2*$bagi));
          $kategoriTmp = [];
          $i = 0;
          $kota = $searchModelRio->ambilNilaiRio();
          foreach ($kota as $key => $value) {
            if($value['rio'] < $nilai_min)
              $kategoririo[$i] = "R";
            elseif ($value['rio'] > $nilai_min && $value['rio'] < $batas1) {
              $baik = ($value['rio'] - $nilai_min) / ($batas1 - $nilai_min);
              $kurangbaik = ($batas1 - $value['rio']) / ($batas1 - $nilai_min);
              $kategoririo[$i] = number_format($kurangbaik,3)." R & ".number_format($baik,3)." T";
             }
            elseif ($value['rio'] >= $batas1 && $value['rio'] <= $batas2) {
              $kategoririo[$i] = "T";
             }
            elseif ($value['rio'] > $batas2 && $value['rio'] < $nilai_max) {
              $baik = ($nilai_max - $value['rio']) / ($nilai_max - $batas2);
              $sangatbaik = ($value['rio'] - $batas2) / ($nilai_max - $batas2);
              $kategoririo[$i] = number_format($baik,3)." T & ".number_format($sangatbaik,3)." ST";
             }
            elseif ($value['rio'] > $nilai_max){
              $kategoririo[$i] = "ST";
             }
            else
              $kategoririo[$i] = "ERROR";

            $i++;
            }


             return $this->render('fuzzy', [
            'data' => $kota,
            'hasilapk' => $kategoriapk,
            'hasilapm' => $kategoriapm,
            'hasiltps' => $kategoritps,
            'hasilrmg' => $kategorirmg,
            'hasilrms' => $kategorirms,
            'hasilrmk' => $kategorirmk,
            'hasilrkrk' => $kategorirkrk,
            'hasilprkb' => $kategoriprkb,
            'hasilpglm' => $kategoripglm,
            'hasilam' => $kategoriam,
            'hasilal' => $kategorial,
            'hasilaps' => $kategoriaps,
            'hasilau' => $kategoriau,
            'hasilrio' => $kategoririo,
        ]);
     }     
}

?>