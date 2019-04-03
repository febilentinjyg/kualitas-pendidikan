<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "rule_tingkat_pelayanan".
 *
 * @property integer $id
 * @property integer $kriteria_rmg
 * @property integer $kriteria_rms
 * @property integer $kriteria_rmk
 * @property integer $kriteria_rkrk
 * @property integer $kriteria_prkb
 * @property integer $kriteria_pglm
 * @property integer $nilai_tingkat_pelayanan
 */
class RuleTingkatPelayanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rule_tingkat_pelayanan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kriteria_rmg', 'kriteria_rms', 'kriteria_rmk', 'kriteria_rkrk', 'kriteria_prkb', 'kriteria_pglm', 'nilai_tingkat_pelayanan'], 'required'],
            [['kriteria_rmg', 'kriteria_rms', 'kriteria_rmk', 'kriteria_rkrk', 'kriteria_prkb', 'kriteria_pglm', 'nilai_tingkat_pelayanan'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kriteria_rmg' => 'Kriteria Rmg',
            'kriteria_rms' => 'Kriteria Rms',
            'kriteria_rmk' => 'Kriteria Rmk',
            'kriteria_rkrk' => 'Kriteria Rkrk',
            'kriteria_prkb' => 'Kriteria Prkb',
            'kriteria_pglm' => 'Kriteria Pglm',
            'nilai_tingkat_pelayanan' => 'Nilai Tingkat Pelayanan',
        ];
    }
}
