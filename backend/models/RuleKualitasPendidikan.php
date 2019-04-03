<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "rule_kualitas_pendidikan".
 *
 * @property integer $id
 * @property integer $kriteria_angka_partisipasi
 * @property integer $kriteria_kualitas_output
 * @property integer $kriteria_tingkat_pelayanan
 * @property integer $nilai_kualitas_pendidikan
 */
class RuleKualitasPendidikan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rule_kualitas_pendidikan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kriteria_angka_partisipasi', 'kriteria_kualitas_output', 'kriteria_tingkat_pelayanan', 'nilai_kualitas_pendidikan'], 'required'],
            [['kriteria_angka_partisipasi', 'kriteria_kualitas_output', 'kriteria_tingkat_pelayanan', 'nilai_kualitas_pendidikan'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kriteria_angka_partisipasi' => 'Kriteria Angka Partisipasi',
            'kriteria_kualitas_output' => 'Kriteria Kualitas Output',
            'kriteria_tingkat_pelayanan' => 'Kriteria Tingkat Pelayanan',
            'nilai_kualitas_pendidikan' => 'Nilai Kualitas Pendidikan',
        ];
    }
}
