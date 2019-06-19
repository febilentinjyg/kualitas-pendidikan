<?php
namespace backend\controllers;


use Yii;
use backend\models\NilaiDefuzzifikasiTigaVariabel;
use backend\models\Indikator;
use backend\models\NilaiFuzzy;
use backend\models\NilaiFuzzyTigaVariabel;
use backend\models\Kota;
use backend\models\IndikatorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class CreateFuzzyController extends Controller{

	public function actionFuzzy(){
		 // return $this->render('fuzzy');

// 		$searchModelApk = new IndikatorSearch();
//           $nilai_min = $searchModelApk->cariMinApk();
//           $nilai_max = $searchModelApk->cariMaxApk();

//           $bagi = ($nilai_max - $nilai_min) / 3;
//           $batas1 = ($nilai_min + $bagi);
//           $batas2 = ($nilai_min + (2*$bagi));
//           $kategoriTmp = [];
//           $i = 0;
//           $kota = $searchModelApk->ambilNilaiApk();
//           //return "<pre>".print_r($kota, true)."</pre>";
//           foreach ($kota as $key => $value) {

//             $nilaiFuzzy = new NilaiFuzzy();
//             $nilaiFuzzy->id_kota      = $value['id_kota'];
//             $nilaiFuzzy->indikator    = 'APK';
//             $nilaiFuzzy->rendah       = 0;
//             $nilaiFuzzy->tinggi       = 0;
//             $nilaiFuzzy->sangat_tinggi= 0;
//           	if($value['apk'] <= $nilai_min){
//               $nilaiFuzzy->rendah  = 1;
//               $kategoriapk[$i] = "R";
//             }
//           	elseif ($value['apk'] > $nilai_min && $value['apk'] < $batas1) {
//           	 	$tinggi = ($value['apk'] - $nilai_min) / ($batas1 - $nilai_min);
//               $rendah = ($batas1 - $value['apk']) / ($batas1 - $nilai_min);
//               $kategoriapk[$i] = number_format($rendah,3)." R & ".number_format($tinggi,3)." T";
//               $nilaiFuzzy->rendah = $rendah;
//               $nilaiFuzzy->tinggi = $tinggi;
//           	}
//           	elseif ($value['apk'] >= $batas1 && $value['apk'] <= $batas2) {
//               $nilaiFuzzy->tinggi       = 1;
//           	 	$kategoriapk[$i] = "T";
//           	}
//           	elseif ($value['apk'] > $batas2 && $value['apk'] < $nilai_max) {
//               $tinggi = ($nilai_max - $value['apk']) / ($nilai_max - $batas2);
//               $sangat_tinggi = ($value['apk'] - $batas2) / ($nilai_max - $batas2);
//           	 	$kategoriapk[$i] = number_format($tinggi,3)." T & ".number_format($sangat_tinggi,3)." ST";
//               $nilaiFuzzy->tinggi = $tinggi;
//               $nilaiFuzzy->sangat_tinggi = $sangat_tinggi;
//             }
//           	elseif ($value['apk'] >= $nilai_max){
//               $nilaiFuzzy->sangat_tinggi = 1;
//           		$kategoriapk[$i] = "ST";
//           	}
//           	else{
//               $kategoriapk[$i] = "ERROR";
//             }
//             $i++;
//             $nilaiFuzzy->save();
//             unset($nilaiFuzzy);
//           }
  
//     $searchModelApm = new IndikatorSearch();
//           $nilai_min = $searchModelApm->cariMinApm();
//           $nilai_max = $searchModelApm->cariMaxApm();

//           $bagi = ($nilai_max - $nilai_min) / 3;
//           $batas1 = ($nilai_min + $bagi);
//           $batas2 = ($nilai_min + (2*$bagi));
//           $kategoriTmp = [];
//           $i = 0;
//           $kota = $searchModelApm->ambilNilaiApm();
//           //return "<pre>".print_r($kota, true)."</pre>";
//           foreach ($kota as $key => $value) {

//             $nilaiFuzzy = new NilaiFuzzy();
//             $nilaiFuzzy->id_kota      = $value['id_kota'];
//             $nilaiFuzzy->indikator    = 'APM';
//             $nilaiFuzzy->rendah       = 0;
//             $nilaiFuzzy->tinggi       = 0;
//             $nilaiFuzzy->sangat_tinggi= 0;
//             if($value['apm'] <= $nilai_min){
//               $nilaiFuzzy->rendah  = 1;
//               $kategoriapm[$i] = "R";
//             }
//             elseif ($value['apm'] > $nilai_min && $value['apm'] < $batas1) {
//               $tinggi = ($value['apm'] - $nilai_min) / ($batas1 - $nilai_min);
//               $rendah = ($batas1 - $value['apm']) / ($batas1 - $nilai_min);
//               $kategoriapm[$i] = number_format($rendah,3)." R & ".number_format($tinggi,3)." T";
//               $nilaiFuzzy->rendah = $rendah;
//               $nilaiFuzzy->tinggi = $tinggi;
//             }
//             elseif ($value['apm'] >= $batas1 && $value['apm'] <= $batas2) {
//               $nilaiFuzzy->tinggi       = 1;
//               $kategoriapm[$i] = "T";
//             }
//             elseif ($value['apm'] > $batas2 && $value['apm'] < $nilai_max) {
//               $tinggi = ($nilai_max - $value['apm']) / ($nilai_max - $batas2);
//               $sangat_tinggi = ($value['apm'] - $batas2) / ($nilai_max - $batas2);
//               $kategoriapm[$i] = number_format($tinggi,3)." T & ".number_format($sangat_tinggi,3)." ST";
//               $nilaiFuzzy->tinggi = $tinggi;
//               $nilaiFuzzy->sangat_tinggi = $sangat_tinggi;
//             }
//             elseif ($value['apm'] >= $nilai_max){
//               $nilaiFuzzy->sangat_tinggi = 1;
//               $kategoriapm[$i] = "ST";
//             }
//             else{
//               $kategoriapm[$i] = "ERROR";
//             }
//             $i++;
//             $nilaiFuzzy->save();
//             unset($nilaiFuzzy);
//           }

// // //----------------------contoh coding sebelum dimasukkan ke database-------------------------------//
// //     // $searchModelApm = new IndikatorSearch();
// //     //       $nilai_min = $searchModelApm->cariMinApm();
// //     //       $nilai_max = $searchModelApm->cariMaxApm();

// //     //       $bagi = ($nilai_max - $nilai_min) / 3;
// //     //       $batas1 = ($nilai_min + $bagi);
// //     //       $batas2 = ($nilai_min + (2*$bagi));
// //     //       $kategoriTmp = [];
// //     //       $i = 0;
// //     //       $kota = $searchModelApm->ambilNilaiApm();
// //     //       foreach ($kota as $key => $value) {
// //     //         if($value['apm'] < $nilai_min)
// //     //           $kategoriapm[$i] = "R";
// //     //         elseif ($value['apm'] > $nilai_min && $value['apm'] < $batas1) {
// //     //           $tinggi = ($value['apm'] - $nilai_min) / ($batas1 - $nilai_min);
// //     //           $rendah = ($batas1 - $value['apm']) / ($batas1 - $nilai_min);
// //     //           $kategoriapm[$i] = number_format($rendah,3)." R & ".number_format($tinggi,3)." T";
// //     //          }
// //     //         elseif ($value['apm'] >= $batas1 && $value['apm'] <= $batas2) {
// //     //           $kategoriapm[$i] = "T";
// //     //          }
// //     //         elseif ($value['apm'] > $batas2 && $value['apm'] < $nilai_max) {
// //     //           $tinggi = ($nilai_max - $value['apm']) / ($nilai_max - $batas2);
// //     //           $sangat_tinggi = ($value['apm'] - $batas2) / ($nilai_max - $batas2);
// //     //           $kategoriapm[$i] = number_format($tinggi,3)." T & ".number_format($sangat_tinggi,3)." ST";
// //     //          }
// //     //         elseif ($value['apm'] > $nilai_max){
// //     //           $kategoriapm[$i] = "ST";
// //     //          }
// //     //         else
// //     //           $kategoriapm[$i] = "ERROR";

// //     //         $i++;
// //     //         }

// // //-----------------------------------------------------------------------------------------------------//

//       // $searchModelTps = new IndikatorSearch();
//       //     $nilai_min = $searchModelTps->cariMinTps();
//       //     $nilai_max = $searchModelTps->cariMaxTps();

//       //     $bagi = ($nilai_max - $nilai_min) / 3;
//       //     $batas1 = ($nilai_min + $bagi);
//       //     $batas2 = ($nilai_min + (2*$bagi));
//       //     $kategoriTmp = [];
//       //     $i = 0;
//       //     $kota = $searchModelTps->ambilNilaiTps();
//       //     foreach ($kota as $key => $value) {
//       //       if($value['tps'] < $nilai_min)
//       //         $kategoritps[$i] = "R";
//       //       elseif ($value['tps'] > $nilai_min && $value['tps'] < $batas1) {
//       //         $tinggi = ($value['tps'] - $nilai_min) / ($batas1 - $nilai_min);
//       //         $rendah = ($batas1 - $value['tps']) / ($batas1 - $nilai_min);
//       //         $kategoritps[$i] = number_format($rendah,3)." R & ".number_format($tinggi,3)." T";
//       //        }
//       //       elseif ($value['tps'] >= $batas1 && $value['tps'] <= $batas2) {
//       //         $kategoritps[$i] = "T";
//       //        }
//       //       elseif ($value['tps'] > $batas2 && $value['tps'] < $nilai_max) {
//       //         $tinggi = ($nilai_max - $value['tps']) / ($nilai_max - $batas2);
//       //         $sangat_tinggi = ($value['tps'] - $batas2) / ($nilai_max - $batas2);
//       //         $kategoritps[$i] = number_format($tinggi,3)." T & ".number_format($sangat_tinggi,3)." ST";
//       //        }
//       //       elseif ($value['tps'] > $nilai_max){
//       //         $kategoritps[$i] = "ST";
//       //        }
//       //       else
//       //         $kategoritps[$i] = "ERROR";

//       //       $i++;
//       //       }

//       $searchModelRmg = new IndikatorSearch();
//           $nilai_min = $searchModelRmg->cariMinRmg();
//           $nilai_max = $searchModelRmg->cariMaxRmg();
//           $nilai_ideal =  16;

//           $bagi = ($nilai_max - $nilai_min) / 3;
//           $batas1 = ($nilai_min + $bagi);
//           $batas2 = ($nilai_min + (2*$bagi));
//           $kategoriTmp = [];
//           $i = 0;
//           $kota = $searchModelRmg->ambilNilaiRmg();
//           //return "<pre>".print_r($kota, true)."</pre>";
//           foreach ($kota as $key => $value) {

//             $nilaiFuzzy = new NilaiFuzzy();
//             $nilaiFuzzy->id_kota      = $value['id_kota'];
//             $nilaiFuzzy->indikator    = 'RMG';
//             $nilaiFuzzy->rendah       = 0;
//             $nilaiFuzzy->tinggi       = 0;
//             $nilaiFuzzy->sangat_tinggi= 0;
//             if ($value['rmg'] >= $nilai_max){
//               $nilaiFuzzy->rendah = 1;
//               $kategorirmg[$i] = "R";
//             }
//             elseif ($value['rmg'] > $batas2 && $value['rmg'] < $nilai_max) {
//               $tinggi = ($nilai_max - $value['rmg']) / ($nilai_max - $batas2);
//               $rendah = ($value['rmg'] - $batas2) / ($nilai_max - $batas2);
//               $kategorirmg[$i] = number_format($rendah,3)." R & ".number_format($tinggi,3)." T";
//               $nilaiFuzzy->tinggi = $tinggi;
//               $nilaiFuzzy->rendah = $rendah;
//             }
//             elseif ($value['rmg'] >= $batas1 && $value['rmg'] <= $batas2) {
//               $nilaiFuzzy->tinggi = 1;
//               $kategorirmg[$i] = "T";
//             }
//             elseif ($value['rmg'] > $nilai_min && $value['rmg'] < $batas1) {
//               $tinggi = ($value['rmg'] - $nilai_min) / ($batas1 - $nilai_min);
//               $sangat_tinggi = ($batas1 - $value['rmg']) / ($batas1 - $nilai_min);
//               $kategorirmg[$i] = number_format($tinggi,3)." T & ".number_format($sangat_tinggi,3)." ST";
//               $nilaiFuzzy->sangat_tinggi = $sangat_tinggi;
//               $nilaiFuzzy->tinggi = $tinggi;
//             }
//             elseif($value['rmg'] <= $nilai_min){
//               $nilaiFuzzy->sangat_tinggi  = 1;
//               $kategorirmg[$i] = "ST";
//             }
            
//             else{
//               $kategorirmg[$i] = "ERROR";
//             }
//             $i++;
//             $nilaiFuzzy->save();
//             unset($nilaiFuzzy);
//           }

// //-------------------------------------------------------------------------------------------------------
//           $searchModelRms = new IndikatorSearch();
//           $nilai_min = $searchModelRms->cariMinRms();
//           $nilai_max = $searchModelRms->cariMaxRms();

//           $bagi = ($nilai_max - $nilai_min) / 3;
//           $batas1 = ($nilai_min + $bagi);
//           $batas2 = ($nilai_min + (2*$bagi));
//           $kategoriTmp = [];
//           $i = 0;
//           $kota = $searchModelRms->ambilNilaiRms();
//           //return "<pre>".print_r($kota, true)."</pre>";
//           foreach ($kota as $key => $value) {

//             $nilaiFuzzy = new NilaiFuzzy();
//             $nilaiFuzzy->id_kota      = $value['id_kota'];
//             $nilaiFuzzy->indikator    = 'RMS';
//             $nilaiFuzzy->rendah       = 0;
//             $nilaiFuzzy->tinggi       = 0;
//             $nilaiFuzzy->sangat_tinggi= 0;
//             if($value['rms'] <= $nilai_min){
//               $nilaiFuzzy->rendah  = 1;
//               $kategorirms[$i] = "R";
//             }
//             elseif ($value['rms'] > $nilai_min && $value['rms'] < $batas1) {
//               $tinggi = ($value['rms'] - $nilai_min) / ($batas1 - $nilai_min);
//               $rendah = ($batas1 - $value['rms']) / ($batas1 - $nilai_min);
//               $kategorirms[$i] = number_format($rendah,3)." R & ".number_format($tinggi,3)." T";
//               $nilaiFuzzy->rendah = $rendah;
//               $nilaiFuzzy->tinggi = $tinggi;
//             }
//             elseif ($value['rms'] >= $batas1 && $value['rms'] <= $batas2) {
//               $nilaiFuzzy->tinggi       = 1;
//               $kategorirms[$i] = "T";
//             }
//             elseif ($value['rms'] > $batas2 && $value['rms'] < $nilai_max) {
//               $tinggi = ($nilai_max - $value['rms']) / ($nilai_max - $batas2);
//               $sangat_tinggi = ($value['rms'] - $batas2) / ($nilai_max - $batas2);
//               $kategorirms[$i] = number_format($tinggi,3)." T & ".number_format($sangat_tinggi,3)." ST";
//               $nilaiFuzzy->tinggi = $tinggi;
//               $nilaiFuzzy->sangat_tinggi = $sangat_tinggi;
//             }
//             elseif ($value['rms'] >= $nilai_max){
//               $nilaiFuzzy->sangat_tinggi = 1;
//               $kategorirms[$i] = "ST";
//             }
//             else{
//               $kategorirms[$i] = "ERROR";
//             }
//             $i++;
//             $nilaiFuzzy->save();
//             unset($nilaiFuzzy);
//           }

// //-----------------------------------------------------------------------------------------------
//           $searchModelRmk = new IndikatorSearch();
//           $nilai_min = $searchModelRmk->cariMinRmk();
//           $nilai_max = $searchModelRmk->cariMaxRmk();
//           $nilai_ideal = 35;

//           $bagi = ($nilai_max - $nilai_min) / 3;
//           $batas1 = ($nilai_min + $bagi);
//           $batas2 = ($nilai_min + (2*$bagi));
//           $kategoriTmp = [];
//           $i = 0;
//           $kota = $searchModelRmk->ambilNilaiRmk();
//           //return "<pre>".print_r($kota, true)."</pre>";
//           foreach ($kota as $key => $value) {

//             $nilaiFuzzy = new NilaiFuzzy();
//             $nilaiFuzzy->id_kota      = $value['id_kota'];
//             $nilaiFuzzy->indikator    = 'RMK';
//             $nilaiFuzzy->rendah       = 0;
//             $nilaiFuzzy->tinggi       = 0;
//             $nilaiFuzzy->sangat_tinggi= 0;
//             if ($value['rmk'] >= $nilai_max){
//               $nilaiFuzzy->rendah = 1;
//               $kategorirmk[$i] = "R";
//             }
//             elseif ($value['rmk'] > $batas2 && $value['rmk'] < $nilai_max) {
//               $tinggi = ($nilai_max - $value['rmk']) / ($nilai_max - $batas2);
//               $rendah = ($value['rmk'] - $batas2) / ($nilai_max - $batas2);
//               $kategorirmk[$i] = number_format($rendah,3)." R & ".number_format($tinggi,3)." T";
//               $nilaiFuzzy->tinggi = $tinggi;
//               $nilaiFuzzy->rendah = $rendah;
//             }
//             elseif ($value['rmk'] >= $batas1 && $value['rmk'] <= $batas2) {
//               $nilaiFuzzy->tinggi       = 1;
//               $kategorirmk[$i] = "T";
//             }
//             elseif ($value['rmk'] > $nilai_min && $value['rmk'] < $batas1) {
//               $tinggi = ($value['rmk'] - $nilai_min) / ($batas1 - $nilai_min);
//               $sangat_tinggi = ($batas1 - $value['rmk']) / ($batas1 - $nilai_min);
//               $kategorirmk[$i] = number_format($tinggi,3)." T & ".number_format($sangat_tinggi,3)." ST";
//               $nilaiFuzzy->sangat_tinggi = $sangat_tinggi;
//               $nilaiFuzzy->tinggi = $tinggi;
//             }
//             elseif($value['rmk'] <= $nilai_min){
//               $nilaiFuzzy->sangat_tinggi  = 1;
//               $kategorirmk[$i] = "R";
//             }
//             else{
//               $kategorirmk[$i] = "ERROR";
//             }
//             $i++;
//             $nilaiFuzzy->save();
//             unset($nilaiFuzzy);
//           }

// //---------------------------------------------------------------------------------------------

//           $searchModelRkrk = new IndikatorSearch();
//           $nilai_min = $searchModelRkrk->cariMinRkrk();
//           $nilai_max = $searchModelRkrk->cariMaxRkrk();

//           $bagi = ($nilai_max - $nilai_min) / 3;
//           $batas1 = ($nilai_min + $bagi);
//           $batas2 = ($nilai_min + (2*$bagi));
//           $kategoriTmp = [];
//           $i = 0;
//           $kota = $searchModelRkrk->ambilNilaiRkrk();
//           //return "<pre>".print_r($kota, true)."</pre>";
//           foreach ($kota as $key => $value) {

//             $nilaiFuzzy = new NilaiFuzzy();
//             $nilaiFuzzy->id_kota      = $value['id_kota'];
//             $nilaiFuzzy->indikator    = 'RKRK';
//             $nilaiFuzzy->rendah       = 0;
//             $nilaiFuzzy->tinggi       = 0;
//             $nilaiFuzzy->sangat_tinggi= 0;
//             if($value['rkrk'] <= $nilai_min){
//               $nilaiFuzzy->rendah  = 1;
//               $kategorirkrk[$i] = "R";
//             }
//             elseif ($value['rkrk'] > $nilai_min && $value['rkrk'] < $batas1) {
//               $tinggi = ($value['rkrk'] - $nilai_min) / ($batas1 - $nilai_min);
//               $rendah = ($batas1 - $value['rkrk']) / ($batas1 - $nilai_min);
//               $kategorirkrk[$i] = number_format($rendah,3)." R & ".number_format($tinggi,3)." T";
//               $nilaiFuzzy->rendah = $rendah;
//               $nilaiFuzzy->tinggi = $tinggi;
//             }
//             elseif ($value['rkrk'] >= $batas1 && $value['rkrk'] <= $batas2) {
//               $nilaiFuzzy->tinggi       = 1;
//               $kategorirkrk[$i] = "T";
//             }
//             elseif ($value['rkrk'] > $batas2 && $value['rkrk'] < $nilai_max) {
//               $tinggi = ($nilai_max - $value['rkrk']) / ($nilai_max - $batas2);
//               $sangat_tinggi = ($value['rkrk'] - $batas2) / ($nilai_max - $batas2);
//               $kategorirkrk[$i] = number_format($tinggi,3)." T & ".number_format($sangat_tinggi,3)." ST";
//               $nilaiFuzzy->tinggi = $tinggi;
//               $nilaiFuzzy->sangat_tinggi = $sangat_tinggi;
//             }
//             elseif ($value['rkrk'] >= $nilai_max){
//               $nilaiFuzzy->sangat_tinggi = 1;
//               $kategorirkrk[$i] = "ST";
//             }
//             else{
//               $kategorirkrk[$i] = "ERROR";
//             }
//             $i++;
//             $nilaiFuzzy->save();
//             unset($nilaiFuzzy);
//           }

// //-----------------------------------------------------------------------------------------------------

//           $searchModelPrkb = new IndikatorSearch();
//           $nilai_min = $searchModelPrkb->cariMinPrkb();
//           $nilai_max = $searchModelPrkb->cariMaxPrkb();

//           $bagi = ($nilai_max - $nilai_min) / 3;
//           $batas1 = ($nilai_min + $bagi);
//           $batas2 = ($nilai_min + (2*$bagi));
//           $kategoriTmp = [];
//           $i = 0;
//           $kota = $searchModelPrkb->ambilNilaiPrkb();
//           //return "<pre>".print_r($kota, true)."</pre>";
//           foreach ($kota as $key => $value) {

//             $nilaiFuzzy = new NilaiFuzzy();
//             $nilaiFuzzy->id_kota      = $value['id_kota'];
//             $nilaiFuzzy->indikator    = 'PRKB';
//             $nilaiFuzzy->rendah       = 0;
//             $nilaiFuzzy->tinggi       = 0;
//             $nilaiFuzzy->sangat_tinggi= 0;
//             if($value['prkb'] <= $nilai_min){
//               $nilaiFuzzy->rendah  = 1;
//               $kategoriprkb[$i] = "R";
//             }
//             elseif ($value['prkb'] > $nilai_min && $value['prkb'] < $batas1) {
//               $tinggi = ($value['prkb'] - $nilai_min) / ($batas1 - $nilai_min);
//               $rendah = ($batas1 - $value['prkb']) / ($batas1 - $nilai_min);
//               $kategoriprkb[$i] = number_format($rendah,3)." R & ".number_format($tinggi,3)." T";
//               $nilaiFuzzy->rendah = $rendah;
//               $nilaiFuzzy->tinggi = $tinggi;
//             }
//             elseif ($value['prkb'] >= $batas1 && $value['prkb'] <= $batas2) {
//               $nilaiFuzzy->tinggi       = 1;
//               $kategoriprkb[$i] = "T";
//             }
//             elseif ($value['prkb'] > $batas2 && $value['prkb'] < $nilai_max) {
//               $tinggi = ($nilai_max - $value['prkb']) / ($nilai_max - $batas2);
//               $sangat_tinggi = ($value['prkb'] - $batas2) / ($nilai_max - $batas2);
//               $kategoriprkb[$i] = number_format($tinggi,3)." T & ".number_format($sangat_tinggi,3)." ST";
//               $nilaiFuzzy->tinggi = $tinggi;
//               $nilaiFuzzy->sangat_tinggi = $sangat_tinggi;
//             }
//             elseif ($value['prkb'] >= $nilai_max){
//               $nilaiFuzzy->sangat_tinggi = 1;
//               $kategoriprkb[$i] = "ST";
//             }
//             else{
//               $kategoriprkb[$i] = "ERROR";
//             }
//             $i++;
//             $nilaiFuzzy->save();
//             unset($nilaiFuzzy);
//           }

// //------------------------------------------------------------------------------------------------------

//           $searchModelPglm = new IndikatorSearch();
//           $nilai_min = $searchModelPglm->cariMinPglm();
//           $nilai_max = $searchModelPglm->cariMaxPglm();

//           $bagi = ($nilai_max - $nilai_min) / 3;
//           $batas1 = ($nilai_min + $bagi);
//           $batas2 = ($nilai_min + (2*$bagi));
//           $kategoriTmp = [];
//           $i = 0;
//           $kota = $searchModelPglm->ambilNilaiPglm();
//           //return "<pre>".print_r($kota, true)."</pre>";
//           foreach ($kota as $key => $value) {

//             $nilaiFuzzy = new NilaiFuzzy();
//             $nilaiFuzzy->id_kota      = $value['id_kota'];
//             $nilaiFuzzy->indikator    = 'PGLM';
//             $nilaiFuzzy->rendah       = 0;
//             $nilaiFuzzy->tinggi       = 0;
//             $nilaiFuzzy->sangat_tinggi= 0;
//             if($value['pglm'] <= $nilai_min){
//               $nilaiFuzzy->rendah  = 1;
//               $kategoripglm[$i] = "R";
//             }
//             elseif ($value['pglm'] > $nilai_min && $value['pglm'] < $batas1) {
//               $tinggi = ($value['pglm'] - $nilai_min) / ($batas1 - $nilai_min);
//               $rendah = ($batas1 - $value['pglm']) / ($batas1 - $nilai_min);
//               $kategoripglm[$i] = number_format($rendah,3)." R & ".number_format($tinggi,3)." T";
//               $nilaiFuzzy->rendah = $rendah;
//               $nilaiFuzzy->tinggi = $tinggi;
//             }
//             elseif ($value['pglm'] >= $batas1 && $value['pglm'] <= $batas2) {
//               $nilaiFuzzy->tinggi       = 1;
//               $kategoripglm[$i] = "T";
//             }
//             elseif ($value['pglm'] > $batas2 && $value['pglm'] < $nilai_max) {
//               $tinggi = ($nilai_max - $value['pglm']) / ($nilai_max - $batas2);
//               $sangat_tinggi = ($value['pglm'] - $batas2) / ($nilai_max - $batas2);
//               $kategoripglm[$i] = number_format($tinggi,3)." T & ".number_format($sangat_tinggi,3)." ST";
//               $nilaiFuzzy->tinggi = $tinggi;
//               $nilaiFuzzy->sangat_tinggi = $sangat_tinggi;
//             }
//             elseif ($value['pglm'] >= $nilai_max){
//               $nilaiFuzzy->sangat_tinggi = 1;
//               $kategoripglm[$i] = "ST";
//             }
//             else{
//               $kategoripglm[$i] = "ERROR";
//             }
//             $i++;
//             $nilaiFuzzy->save();
//             unset($nilaiFuzzy);
//           }
// //---------------------------------------------------------------------------------------------------------

//           $searchModelAm = new IndikatorSearch();
//           $nilai_min = $searchModelAm->cariMinAm();
//           $nilai_max = $searchModelAm->cariMaxAm();

//           $bagi = ($nilai_max - $nilai_min) / 3;
//           $batas1 = ($nilai_min + $bagi);
//           $batas2 = ($nilai_min + (2*$bagi));
//           $kategoriTmp = [];
//           $i = 0;
//           $kota = $searchModelAm->ambilNilaiAm();
//           //return "<pre>".print_r($kota, true)."</pre>";
//           foreach ($kota as $key => $value) {

//             $nilaiFuzzy = new NilaiFuzzy();
//             $nilaiFuzzy->id_kota      = $value['id_kota'];
//             $nilaiFuzzy->indikator    = 'AM';
//             $nilaiFuzzy->rendah       = 0;
//             $nilaiFuzzy->tinggi       = 0;
//             $nilaiFuzzy->sangat_tinggi= 0;
//             if($value['am'] <= $nilai_min){
//               $nilaiFuzzy->rendah  = 1;
//               $kategoriam[$i] = "R";
//             }
//             elseif ($value['am'] > $nilai_min && $value['am'] < $batas1) {
//               $tinggi = ($value['am'] - $nilai_min) / ($batas1 - $nilai_min);
//               $rendah = ($batas1 - $value['am']) / ($batas1 - $nilai_min);
//               $kategoriam[$i] = number_format($rendah,3)." R & ".number_format($tinggi,3)." T";
//               $nilaiFuzzy->rendah = $rendah;
//               $nilaiFuzzy->tinggi = $tinggi;
//             }
//             elseif ($value['am'] >= $batas1 && $value['am'] <= $batas2) {
//               $nilaiFuzzy->tinggi       = 1;
//               $kategoriam[$i] = "T";
//             }
//             elseif ($value['am'] > $batas2 && $value['am'] < $nilai_max) {
//               $tinggi = ($nilai_max - $value['am']) / ($nilai_max - $batas2);
//               $sangat_tinggi = ($value['am'] - $batas2) / ($nilai_max - $batas2);
//               $kategoriam[$i] = number_format($tinggi,3)." T & ".number_format($sangat_tinggi,3)." ST";
//               $nilaiFuzzy->tinggi = $tinggi;
//               $nilaiFuzzy->sangat_tinggi = $sangat_tinggi;
//             }
//             elseif ($value['am'] >= $nilai_max){
//               $nilaiFuzzy->sangat_tinggi = 1;
//               $kategoriam[$i] = "ST";
//             }
//             else{
//               $kategoriam[$i] = "ERROR";
//             }
//             $i++;
//             $nilaiFuzzy->save();
//             unset($nilaiFuzzy);
//           }

// //------------------------------------------------------------------------------------------------------------

//           $searchModelAl = new IndikatorSearch();
//           $nilai_min = $searchModelAl->cariMinAl();
//           $nilai_max = $searchModelAl->cariMaxAl();

//           $bagi = ($nilai_max - $nilai_min) / 3;
//           $batas1 = ($nilai_min + $bagi);
//           $batas2 = ($nilai_min + (2*$bagi));
//           $kategoriTmp = [];
//           $i = 0;
//           $kota = $searchModelAl->ambilNilaiAl();
//           //return "<pre>".print_r($kota, true)."</pre>";
//           foreach ($kota as $key => $value) {

//             $nilaiFuzzy = new NilaiFuzzy();
//             $nilaiFuzzy->id_kota      = $value['id_kota'];
//             $nilaiFuzzy->indikator    = 'AL';
//             $nilaiFuzzy->rendah       = 0;
//             $nilaiFuzzy->tinggi       = 0;
//             $nilaiFuzzy->sangat_tinggi= 0;
//             if($value['al'] <= $nilai_min){
//               $nilaiFuzzy->rendah  = 1;
//               $kategorial[$i] = "R";
//             }
//             elseif ($value['al'] > $nilai_min && $value['al'] < $batas1) {
//               $tinggi = ($value['al'] - $nilai_min) / ($batas1 - $nilai_min);
//               $rendah = ($batas1 - $value['al']) / ($batas1 - $nilai_min);
//               $kategorial[$i] = number_format($rendah,3)." R & ".number_format($tinggi,3)." T";
//               $nilaiFuzzy->rendah = $rendah;
//               $nilaiFuzzy->tinggi = $tinggi;
//             }
//             elseif ($value['al'] >= $batas1 && $value['al'] <= $batas2) {
//               $nilaiFuzzy->tinggi       = 1;
//               $kategorial[$i] = "T";
//             }
//             elseif ($value['al'] > $batas2 && $value['al'] < $nilai_max) {
//               $tinggi = ($nilai_max - $value['al']) / ($nilai_max - $batas2);
//               $sangat_tinggi = ($value['al'] - $batas2) / ($nilai_max - $batas2);
//               $kategorial[$i] = number_format($tinggi,3)." T & ".number_format($sangat_tinggi,3)." ST";
//               $nilaiFuzzy->tinggi = $tinggi;
//               $nilaiFuzzy->sangat_tinggi = $sangat_tinggi;
//             }
//             elseif ($value['al'] >= $nilai_max){
//               $nilaiFuzzy->sangat_tinggi = 1;
//               $kategorial[$i] = "ST";
//             }
//             else{
//               $kategorial[$i] = "ERROR";
//             }
//             $i++;
//             $nilaiFuzzy->save();
//             unset($nilaiFuzzy);
//           }

// //----------------------------------------------------------------------------------------------------------

//           $searchModelAps = new IndikatorSearch();
//           $nilai_min = $searchModelAps->cariMinAps();
//           $nilai_max = $searchModelAps->cariMaxAps();

//           $bagi = ($nilai_max - $nilai_min) / 3;
//           $batas1 = ($nilai_min + $bagi);
//           $batas2 = ($nilai_min + (2*$bagi));
//           $kategoriTmp = [];
//           $i = 0;
//           $kota = $searchModelAps->ambilNilaiAps();
//           //return "<pre>".print_r($kota, true)."</pre>";
//           foreach ($kota as $key => $value) {

//             $nilaiFuzzy = new NilaiFuzzy();
//             $nilaiFuzzy->id_kota      = $value['id_kota'];
//             $nilaiFuzzy->indikator    = 'APS';
//             $nilaiFuzzy->rendah       = 0;
//             $nilaiFuzzy->tinggi       = 0;
//             $nilaiFuzzy->sangat_tinggi= 0;
//             if($value['aps'] <= $nilai_min){
//               $nilaiFuzzy->sangat_tinggi  = 1;
//               $kategoriaps[$i] = "ST";
//             }
//             elseif ($value['aps'] > $nilai_min && $value['aps'] < $batas1) {
//               $tinggi = ($value['aps'] - $nilai_min) / ($batas1 - $nilai_min);
//               $sangat_tinggi = ($batas1 - $value['aps']) / ($batas1 - $nilai_min);
//               $kategoriaps[$i] = number_format($tinggi,3)." T & ".number_format($sangat_tinggi,3)." ST";
//               $nilaiFuzzy->sangat_tinggi = $sangat_tinggi;
//               $nilaiFuzzy->tinggi = $tinggi;
//             }
//             elseif ($value['aps'] >= $batas1 && $value['aps'] <= $batas2) {
//               $nilaiFuzzy->tinggi       = 1;
//               $kategoriaps[$i] = "T";
//             }
//             elseif ($value['aps'] > $batas2 && $value['aps'] < $nilai_max) {
//               $tinggi = ($nilai_max - $value['aps']) / ($nilai_max - $batas2);
//               $rendah = ($value['aps'] - $batas2) / ($nilai_max - $batas2);
//               $kategoriaps[$i] = number_format($rendah,3)." R & ".number_format($tinggi,3)." T";
//               $nilaiFuzzy->tinggi = $tinggi;
//               $nilaiFuzzy->rendah = $rendah;
//             }
//             elseif ($value['aps'] >= $nilai_max){
//               $nilaiFuzzy->rendah = 1;
//               $kategoriaps[$i] = "R";
//             }
//             else{
//               $kategoriaps[$i] = "ERROR";
//             }
//             $i++;
//             $nilaiFuzzy->save();
//             unset($nilaiFuzzy);
//           }

// //------------------------------------------------------------------------------------------

//           $searchModelAu = new IndikatorSearch();
//           $nilai_min = $searchModelAu->cariMinAu();
//           $nilai_max = $searchModelAu->cariMaxAu();

//           $bagi = ($nilai_max - $nilai_min) / 3;
//           $batas1 = ($nilai_min + $bagi);
//           $batas2 = ($nilai_min + (2*$bagi));
//           $kategoriTmp = [];
//           $i = 0;
//           $kota = $searchModelAu->ambilNilaiAu();
//           //return "<pre>".print_r($kota, true)."</pre>";
//           foreach ($kota as $key => $value) {

//             $nilaiFuzzy = new NilaiFuzzy();
//             $nilaiFuzzy->id_kota      = $value['id_kota'];
//             $nilaiFuzzy->indikator    = 'AU';
//             $nilaiFuzzy->rendah       = 0;
//             $nilaiFuzzy->tinggi       = 0;
//             $nilaiFuzzy->sangat_tinggi= 0;
//             if($value['au'] <= $nilai_min){
//               $nilaiFuzzy->sangat_tinggi  = 1;
//               $kategoriau[$i] = "ST";
//             }
//             elseif ($value['au'] > $nilai_min && $value['au'] < $batas1) {
//               $tinggi = ($value['au'] - $nilai_min) / ($batas1 - $nilai_min);
//               $sangat_tinggi = ($batas1 - $value['au']) / ($batas1 - $nilai_min);
//               $kategoriau[$i] = number_format($tinggi,3)." T & ".number_format($sangat_tinggi,3)." ST";
//               $nilaiFuzzy->sangat_tinggi = $sangat_tinggi;
//               $nilaiFuzzy->tinggi = $tinggi;
//             }
//             elseif ($value['au'] >= $batas1 && $value['au'] <= $batas2) {
//               $nilaiFuzzy->tinggi       = 1;
//               $kategoriau[$i] = "T";
//             }
//             elseif ($value['au'] > $batas2 && $value['au'] < $nilai_max) {
//               $tinggi = ($nilai_max - $value['au']) / ($nilai_max - $batas2);
//               $rendah = ($value['au'] - $batas2) / ($nilai_max - $batas2);
//               $kategoriau[$i] = number_format($rendah,3)." R & ".number_format($tinggi,3)." T";
//               $nilaiFuzzy->tinggi = $tinggi;
//               $nilaiFuzzy->rendah = $rendah;
//             }
//             elseif ($value['au'] >= $nilai_max){
//               $nilaiFuzzy->rendah = 1;
//               $kategoriau[$i] = "R";
//             }
//             else{
//               $kategoriau[$i] = "ERROR";
//             }
//             $i++;
//             $nilaiFuzzy->save();
//             unset($nilaiFuzzy);
//           }

// //-------------------------------------------------------------------------------------------------------

//           $searchModelRio = new IndikatorSearch();
//           $nilai_min = $searchModelRio->cariMinRio();
//           $nilai_max = $searchModelRio->cariMaxRio();

//           $bagi = ($nilai_max - $nilai_min) / 3;
//           $batas1 = ($nilai_min + $bagi);
//           $batas2 = ($nilai_min + (2*$bagi));
//           $kategoriTmp = [];
//           $i = 0;
//           $kota = $searchModelRio->ambilNilaiRio();
//           //return "<pre>".print_r($kota, true)."</pre>";
//           foreach ($kota as $key => $value) {

//             $nilaiFuzzy = new NilaiFuzzy();
//             $nilaiFuzzy->id_kota      = $value['id_kota'];
//             $nilaiFuzzy->indikator    = 'RIO';
//             $nilaiFuzzy->rendah       = 0;
//             $nilaiFuzzy->tinggi       = 0;
//             $nilaiFuzzy->sangat_tinggi= 0;
//             if($value['rio'] <= $nilai_min){
//               $nilaiFuzzy->rendah  = 1;
//               $kategoririo[$i] = "R";
//             }
//             elseif ($value['rio'] > $nilai_min && $value['rio'] < $batas1) {
//               $tinggi = ($value['rio'] - $nilai_min) / ($batas1 - $nilai_min);
//               $rendah = ($batas1 - $value['rio']) / ($batas1 - $nilai_min);
//               $kategoririo[$i] = number_format($rendah,3)." R & ".number_format($tinggi,3)." T";
//               $nilaiFuzzy->rendah = $rendah;
//               $nilaiFuzzy->tinggi = $tinggi;
//             }
//             elseif ($value['rio'] >= $batas1 && $value['rio'] <= $batas2) {
//               $nilaiFuzzy->tinggi       = 1;
//               $kategoririo[$i] = "T";
//             }
//             elseif ($value['rio'] > $batas2 && $value['rio'] < $nilai_max) {
//               $tinggi = ($nilai_max - $value['rio']) / ($nilai_max - $batas2);
//               $sangat_tinggi = ($value['rio'] - $batas2) / ($nilai_max - $batas2);
//               $kategoririo[$i] = number_format($tinggi,3)." T & ".number_format($sangat_tinggi,3)." ST";
//               $nilaiFuzzy->tinggi = $tinggi;
//               $nilaiFuzzy->sangat_tinggi = $sangat_tinggi;
//             }
//             elseif ($value['rio'] >= $nilai_max){
//               $nilaiFuzzy->sangat_tinggi = 1;
//               $kategoririo[$i] = "ST";
//             }
//             else{
//               $kategoririo[$i] = "ERROR";
//             }
//             $i++;
//             $nilaiFuzzy->save();
//             unset($nilaiFuzzy);
//           }

// //-------------------------------------------------------------------------------------------------------

//           $searchModelAp = new NilaiDefuzzifikasiTigaVariabel();
//           $nilai_min = $searchModelAp->cariMinAp();
//           $nilai_max = $searchModelAp->cariMaxAp();

//           $bagi = ($nilai_max - $nilai_min) / 3;
//           $batas1 = ($nilai_min + $bagi);
//           $batas2 = ($nilai_min + (2*$bagi));
//           $kategoriTmp = [];
//           $i = 0;
//           $kota = $searchModelAp->ambilNilaiAp();
//           //return "<pre>".print_r($kota, true)."</pre>";
//           foreach ($kota as $key => $value) {

//             $nilaiFuzzyTigaVariabel = new NilaiFuzzyTigaVariabel();
//             $nilaiFuzzyTigaVariabel->id_kota      = $value['id_kota'];
//             $nilaiFuzzyTigaVariabel->indikator    = 'angka_partisipasi';
//             $nilaiFuzzyTigaVariabel->kurang_baik  = 0;
//             $nilaiFuzzyTigaVariabel->baik         = 0;
//             $nilaiFuzzyTigaVariabel->sangat_baik  = 0;
//             if($value['angka_partisipasi'] <= $nilai_min){
//               $nilaiFuzzyTigaVariabel->kurang_baik  = 1;
//               $kategoriap[$i] = "KB";
//             }
//             elseif ($value['angka_partisipasi'] > $nilai_min && $value['angka_partisipasi'] < $batas1) {
//               $baik = ($value['angka_partisipasi'] - $nilai_min) / ($batas1 - $nilai_min);
//               $kurang_baik = ($batas1 - $value['angka_partisipasi']) / ($batas1 - $nilai_min);
//               $kategoriap[$i] = number_format($kurang_baik,5)." KB & ".number_format($baik,5)." B";
//               $nilaiFuzzyTigaVariabel->kurang_baik = $kurang_baik;
//               $nilaiFuzzyTigaVariabel->baik = $baik;
//             }
//             elseif ($value['angka_partisipasi'] >= $batas1 && $value['angka_partisipasi'] <= $batas2) {
//               $nilaiFuzzyTigaVariabel->baik = 1;
//               $kategoriap[$i]  = "B";
//             }
//             elseif ($value['angka_partisipasi'] > $batas2 && $value['angka_partisipasi'] < $nilai_max) {
//               $baik = ($nilai_max - $value['angka_partisipasi']) / ($nilai_max - $batas2);
//               $sangat_baik = ($value['angka_partisipasi'] - $batas2) / ($nilai_max - $batas2);
//               $kategoriap[$i] = number_format($baik,5)." B & ".number_format($sangat_baik,5)." SB";
//               $nilaiFuzzyTigaVariabel->baik = $baik;
//               $nilaiFuzzyTigaVariabel->sangat_baik = $sangat_baik;
//             }
//             elseif ($value['angka_partisipasi'] >= $nilai_max){
//               $nilaiFuzzyTigaVariabel->sangat_baik = 1;
//               $kategoriap[$i] = "SB";
//             }
//             else{
//               $kategoriap[$i] = "ERROR";
//             }
//             $i++;
//             $nilaiFuzzyTigaVariabel->save();
//             unset($nilaiFuzzyTigaVariabel);

            
//           }

// //	-------------------------------------------------------------------------------------------------------

//           $searchModelTp = new NilaiDefuzzifikasiTigaVariabel();
//           $nilai_min = $searchModelTp->cariMinTp();
//           $nilai_max = $searchModelTp->cariMaxTp();

//           $bagi = ($nilai_max - $nilai_min) / 3;
//           $batas1 = ($nilai_min + $bagi);
//           $batas2 = ($nilai_min + (2*$bagi));
//           $kategoriTmp = [];
//           $i = 0;
//           $kota = $searchModelTp->ambilNilaiTp();
//           //return "<pre>".print_r($kota, true)."</pre>";
//           foreach ($kota as $key => $value) {

//             $nilaiFuzzyTigaVariabel = new NilaiFuzzyTigaVariabel();
//             $nilaiFuzzyTigaVariabel->id_kota      = $value['id_kota'];
//             $nilaiFuzzyTigaVariabel->indikator    = 'tingkat_pelayanan';
//             $nilaiFuzzyTigaVariabel->kurang_baik  = 0;
//             $nilaiFuzzyTigaVariabel->baik         = 0;
//             $nilaiFuzzyTigaVariabel->sangat_baik  = 0;
//             if($value['tingkat_pelayanan'] <= $nilai_min){
//               $nilaiFuzzyTigaVariabel->kurang_baik  = 1;
//               $kategoritp[$i] = "KB";
//             }
//             elseif ($value['tingkat_pelayanan'] > $nilai_min && $value['tingkat_pelayanan'] < $batas1) {
//               $baik = ($value['tingkat_pelayanan'] - $nilai_min) / ($batas1 - $nilai_min);
//               $kurang_baik = ($batas1 - $value['tingkat_pelayanan']) / ($batas1 - $nilai_min);
//               $kategoritp[$i] = number_format($kurang_baik,5)." KB & ".number_format($baik,5)." B";
//               $nilaiFuzzyTigaVariabel->kurang_baik = $kurang_baik;
//               $nilaiFuzzyTigaVariabel->baik = $baik;
//             }
//             elseif ($value['tingkat_pelayanan'] >= $batas1 && $value['tingkat_pelayanan'] <= $batas2) {
//               $nilaiFuzzyTigaVariabel->baik = 1;
//               $kategoritp[$i]  = "B";
//             }
//             elseif ($value['tingkat_pelayanan'] > $batas2 && $value['tingkat_pelayanan'] < $nilai_max) {
//               $baik = ($nilai_max - $value['tingkat_pelayanan']) / ($nilai_max - $batas2);
//               $sangat_baik = ($value['tingkat_pelayanan'] - $batas2) / ($nilai_max - $batas2);
//               $kategoritp[$i] = number_format($baik,5)." B & ".number_format($sangat_baik,5)." SB";
//               $nilaiFuzzyTigaVariabel->baik = $baik;
//               $nilaiFuzzyTigaVariabel->sangat_baik = $sangat_baik;
//             }
//             elseif ($value['tingkat_pelayanan'] >= $nilai_max){
//               $nilaiFuzzyTigaVariabel->sangat_baik = 1;
//               $kategoritp[$i] = "SB";
//             }
//             else{
//               $kategoritp[$i] = "ERROR";
//             }
//             $i++;
//             $nilaiFuzzyTigaVariabel->save();
//             unset($nilaiFuzzyTigaVariabel);

            
//           }   

// //		-------------------------------------------------------------------------------------------------------

//           $searchModelKo = new NilaiDefuzzifikasiTigaVariabel();
//           $nilai_min = $searchModelKo->cariMinKo();
//           $nilai_max = $searchModelKo->cariMaxKo();

//           $bagi = ($nilai_max - $nilai_min) / 3;
//           $batas1 = ($nilai_min + $bagi);
//           $batas2 = ($nilai_min + (2*$bagi));
//           $kategoriTmp = [];
//           $i = 0;
//           $kota = $searchModelKo->ambilNilaiKo();
//           //return "<pre>".print_r($kota, true)."</pre>";
//           foreach ($kota as $key => $value) {

//             $nilaiFuzzyTigaVariabel = new NilaiFuzzyTigaVariabel();
//             $nilaiFuzzyTigaVariabel->id_kota      = $value['id_kota'];
//             $nilaiFuzzyTigaVariabel->indikator    = 'kualitas_output';
//             $nilaiFuzzyTigaVariabel->kurang_baik  = 0;
//             $nilaiFuzzyTigaVariabel->baik         = 0;
//             $nilaiFuzzyTigaVariabel->sangat_baik  = 0;
//             if($value['kualitas_output'] <= $nilai_min){
//               $nilaiFuzzyTigaVariabel->kurang_baik  = 1;
//               $kategoriko[$i] = "KB";
//             }
//             elseif ($value['kualitas_output'] > $nilai_min && $value['kualitas_output'] < $batas1) {
//               $baik = ($value['kualitas_output'] - $nilai_min) / ($batas1 - $nilai_min);
//               $kurang_baik = ($batas1 - $value['kualitas_output']) / ($batas1 - $nilai_min);
//               $kategoriko[$i] = number_format($kurang_baik,5)." KB & ".number_format($baik,5)." B";
//               $nilaiFuzzyTigaVariabel->kurang_baik = $kurang_baik;
//               $nilaiFuzzyTigaVariabel->baik = $baik;
//             }
//             elseif ($value['kualitas_output'] >= $batas1 && $value['kualitas_output'] <= $batas2) {
//               $nilaiFuzzyTigaVariabel->baik = 1;
//               $kategoriko[$i]  = "B";
//             }
//             elseif ($value['kualitas_output'] > $batas2 && $value['kualitas_output'] < $nilai_max) {
//               $baik = ($nilai_max - $value['kualitas_output']) / ($nilai_max - $batas2);
//               $sangat_baik = ($value['kualitas_output'] - $batas2) / ($nilai_max - $batas2);
//               $kategoriko[$i] = number_format($baik,5)." B & ".number_format($sangat_baik,5)." SB";
//               $nilaiFuzzyTigaVariabel->baik = $baik;
//               $nilaiFuzzyTigaVariabel->sangat_baik = $sangat_baik;
//             }
//             elseif ($value['kualitas_output'] >= $nilai_max){
//               $nilaiFuzzyTigaVariabel->sangat_baik = 1;
//               $kategoriko[$i] = "SB";
//             }
//             else{
//               $kategoriko[$i] = "ERROR";
//             }
//             $i++;
//             $nilaiFuzzyTigaVariabel->save();
//             unset($nilaiFuzzyTigaVariabel);

//           }
          
            return $this->render('fuzzy', [
            // 'data' => $kota,
            // 'hasilapk' => $kategoriapk,
            // 'hasilapm' => $kategoriapm,
            // // 'hasiltps' => $kategoritps,
            // 'hasilrmg' => $kategorirmg,
            // 'hasilrms' => $kategorirms,
            // 'hasilrmk' => $kategorirmk,
            // 'hasilrkrk' => $kategorirkrk,
            // 'hasilprkb' => $kategoriprkb,
            // 'hasilpglm' => $kategoripglm,
            // 'hasilam' => $kategoriam,
            // 'hasilal' => $kategorial,
            // 'hasilaps' => $kategoriaps,
            // 'hasilau' => $kategoriau,
            // 'hasilrio' => $kategoririo,
            // 'hasilap' => $kategoriap,
            // 'hasiltp' => $kategoritp,
            // 'hasilko' => $kategoriko,
        ]);
     }     
}

?>