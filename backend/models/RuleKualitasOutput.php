<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "rule_kualitas_output".
 *
 * @property integer $id
 * @property integer $kriteria_am
 * @property integer $kriteria_al
 * @property integer $kriteria_aps
 * @property integer $kriteria_au
 * @property integer $kriteria_rio
 * @property integer $nilai_kualitas_output
 */
class RuleKualitasOutput extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rule_kualitas_output';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kriteria_am', 'kriteria_al', 'kriteria_aps', 'kriteria_au', 'kriteria_rio', 'nilai_kualitas_output'], 'required'],
            [['kriteria_am', 'kriteria_al', 'kriteria_aps', 'kriteria_au', 'kriteria_rio', 'nilai_kualitas_output'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kriteria_am' => 'Kriteria Am',
            'kriteria_al' => 'Kriteria Al',
            'kriteria_aps' => 'Kriteria Aps',
            'kriteria_au' => 'Kriteria Au',
            'kriteria_rio' => 'Kriteria Rio',
            'nilai_kualitas_output' => 'Nilai Kualitas Output',
        ];
    }
}
