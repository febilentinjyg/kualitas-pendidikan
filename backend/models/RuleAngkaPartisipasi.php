<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "rule_angka_partisipasi".
 *
 * @property integer $id
 * @property integer $kriteria_apk
 * @property integer $kriteria_apm
 * @property integer $nilai_angka_partisipasi
 */
class RuleAngkaPartisipasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rule_angka_partisipasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kriteria_apk', 'kriteria_apm', 'nilai_angka_partisipasi'], 'required'],
            [['kriteria_apk', 'kriteria_apm', 'nilai_angka_partisipasi'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kriteria_apk' => 'Kriteria Apk',
            'kriteria_apm' => 'Kriteria Apm',
            'nilai_angka_partisipasi' => 'Nilai Angka Partisipasi',
        ];
    }
}
