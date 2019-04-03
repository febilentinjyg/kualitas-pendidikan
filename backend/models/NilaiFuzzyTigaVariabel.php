<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "nilai_fuzzy_tiga_variabel".
 *
 * @property integer $id
 * @property integer $id_kota
 * @property string $indikator
 * @property double $kurang_baik
 * @property double $baik
 * @property double $sangat_baik
 *
 * @property Kota $idKota
 */
class NilaiFuzzyTigaVariabel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nilai_fuzzy_tiga_variabel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kota', 'indikator', 'kurang_baik', 'baik', 'sangat_baik'], 'required'],
            [['id_kota'], 'integer'],
            [['kurang_baik', 'baik', 'sangat_baik'], 'number'],
            [['indikator'], 'string', 'max' => 50],
            [['id_kota'], 'exist', 'skipOnError' => true, 'targetClass' => Kota::className(), 'targetAttribute' => ['id_kota' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_kota' => 'Id Kota',
            'indikator' => 'Indikator',
            'kurang_baik' => 'Kurang Baik',
            'baik' => 'Baik',
            'sangat_baik' => 'Sangat Baik',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKota()
    {
        return $this->hasOne(Kota::className(), ['id' => 'id_kota']);
    }
}
