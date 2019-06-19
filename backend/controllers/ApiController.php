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
use backend\models\Indikator;
use backend\models\VariabelKotaBaru;

class ApiController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionKualitasPendidikanLama()
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

//--------------------------------------------------------------------

    public function actionKualitasPendidikan()
    {
         $model = NilaiDefuzzifikasiTigaVariabel::find()
            ->select(['nilai_defuzzifikasi_tiga_variabel.*', 'indikator.*', 'kota.nama as nama', 'kota.id as id'])
            ->innerJoin('kota', 'kota.id = nilai_defuzzifikasi_tiga_variabel.id_kota')
            ->innerJoin('variabel_kota_baru', 'variabel_kota_baru.id_kota = kota.id')
            ->innerJoin('indikator', 'indikator.id_varkota = variabel_kota_baru.id')
            ->asArray()
            ->all();

        $modelKp = new RuleKualitasPendidikan();
        $batas = [
            'ap' => [floatval($modelKp->cariMinAp()), floatval($modelKp->cariMaxAp())],
            'tp' => [floatval($modelKp->cariMinTp()), floatval($modelKp->cariMaxTp())],
            'ko' => [floatval($modelKp->cariMinKo()), floatval($modelKp->cariMaxKo())]
        ];

        foreach ($batas as $key => $value) {
            $bagi = ($value[1] - $value[0]) / 3;
            $batas[$key] = [
                [$value[0], $value[0] + (1 * $bagi)],
                [$value[0] + (1 * $bagi), $value[0] + (2 * $bagi)],
                [$value[0] + (2 * $bagi), $value[1]]
            ];
        }

        foreach ($model as $key => $value) {
            $nilai = floatval($value['defuzzifikasi_angka_partisipasi']);
            foreach ($batas['ap'] as $key1 => $value1) {
                if($nilai >= $value1[0] && $nilai <= $value1[1])
                    $model[$key]['kelas_defuzzifikasi_angka_partisipasi'] = $key1+1;
            }

            $nilai = floatval($value['defuzzifikasi_tingkat_pelayanan']);
            foreach ($batas['tp'] as $key1 => $value1) {
                if($nilai >= $value1[0] && $nilai <= $value1[1])
                    $model[$key]['kelas_defuzzifikasi_tingkat_pelayanan'] = $key1+1;
            }

            $nilai = floatval($value['defuzzifikasi_kualitas_output']);
            foreach ($batas['ko'] as $key1 => $value1) {
                if($nilai >= $value1[0] && $nilai <= $value1[1])
                    $model[$key]['kelas_defuzzifikasi_kualitas_output'] = $key1+1;
            } 

            $rule = RuleKualitasPendidikan::find()
            ->select(['rule_kualitas_pendidikan.*'])
            ->where(['kriteria_angka_partisipasi'=> $model[$key]['kelas_defuzzifikasi_angka_partisipasi']])
            ->andWhere(['kriteria_tingkat_pelayanan' => $model[$key]['kelas_defuzzifikasi_tingkat_pelayanan']])
            ->andWhere(['kriteria_kualitas_output' => $model[$key]['kelas_defuzzifikasi_kualitas_output']])
            ->one();

            $indikator = Indikator::find()
            ->select(['indikator.*'])
            ->innerJoin('variabel_kota_baru', 'variabel_kota_baru.id = indikator.id_varkota')
            ->where(['variabel_kota_baru.id_kota' => $value['id']])
            ->asArray()
            ->one();

            $model[$key]['indikator'] = $indikator;
        }

        return json_encode($model);
    }

//---------------------------------------------------------------------------------

    public function actionGrafikKualitasPendidikan(){
        $model = NilaiDefuzzifikasiTigaVariabel::find()
            ->select(['nilai_defuzzifikasi_tiga_variabel.*', 'kota.nama as nama_kota'])
            ->innerJoin('kota', 'kota.id = nilai_defuzzifikasi_tiga_variabel.id_kota')
            ->asArray()
            ->all();

        $modelKp = new RuleKualitasPendidikan();
        $batas = [
            'ap' => [floatval($modelKp->cariMinAp()), floatval($modelKp->cariMaxAp())],
            'tp' => [floatval($modelKp->cariMinTp()), floatval($modelKp->cariMaxTp())],
            'ko' => [floatval($modelKp->cariMinKo()), floatval($modelKp->cariMaxKo())]
        ];

        foreach ($batas as $key => $value) {
            $bagi = ($value[1] - $value[0]) / 3;
            $batas[$key] = [
                [$value[0], $value[0] + (1 * $bagi)],
                [$value[0] + (1 * $bagi), $value[0] + (2 * $bagi)],
                [$value[0] + (2 * $bagi), $value[1]]
            ];
        }

        foreach ($model as $key => $value) {
            $nilai = floatval($value['defuzzifikasi_angka_partisipasi']);
            foreach ($batas['ap'] as $key1 => $value1) {
                if($nilai >= $value1[0] && $nilai <= $value1[1])
                    $model[$key]['kelas_defuzzifikasi_angka_partisipasi'] = $key1+1;
            }

            $nilai = floatval($value['defuzzifikasi_tingkat_pelayanan']);
            foreach ($batas['tp'] as $key1 => $value1) {
                if($nilai >= $value1[0] && $nilai <= $value1[1])
                    $model[$key]['kelas_defuzzifikasi_tingkat_pelayanan'] = $key1+1;
            }

            $nilai = floatval($value['defuzzifikasi_kualitas_output']);
            foreach ($batas['ko'] as $key1 => $value1) {
                if($nilai >= $value1[0] && $nilai <= $value1[1])
                    $model[$key]['kelas_defuzzifikasi_kualitas_output'] = $key1+1;
            } 

            $rule = RuleKualitasPendidikan::find()
            ->select(['rule_kualitas_pendidikan.*'])
            ->where(['kriteria_angka_partisipasi'=> $model[$key]['kelas_defuzzifikasi_angka_partisipasi']])
            ->andWhere(['kriteria_tingkat_pelayanan' => $model[$key]['kelas_defuzzifikasi_tingkat_pelayanan']])
            ->andWhere(['kriteria_kualitas_output' => $model[$key]['kelas_defuzzifikasi_kualitas_output']])
            ->one();

            $model[$key]['nilai_kualitas_pendidikan'] = $rule->nilai_kualitas_pendidikan;
        }

        $jumlah_kurangbaik = 0;
        $jumlah_cukupbaik = 0;
        $jumlah_baik = 0;

        foreach ($model as $key => $value) {
            if($value['nilai_kualitas_pendidikan'] <= 4)
                $jumlah_kurangbaik++;
            elseif ($value['nilai_kualitas_pendidikan'] <= 7)
                $jumlah_cukupbaik++;
            else
                $jumlah_baik++;
        }
        return json_encode([
            [
                'name' => 'Kurang Baik',
                'y' => $jumlah_kurangbaik,
            ],
            [
                'name' => 'Cukup Baik',
                'y' => $jumlah_cukupbaik,
            ],
            [
                'name' => 'Baik',
                'y' => $jumlah_baik,
            ],
        ]);
    }
}
