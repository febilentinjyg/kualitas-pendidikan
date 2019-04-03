<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "nilai_fuzzy".
 *
 * @property integer $id
 * @property integer $id_kota
 * @property string $indikator
 * @property double $rendah
 * @property double $tinggi
 * @property double $sangat_tinggi
 *
 * @property Kota $idKota
 */
class NilaiFuzzy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nilai_fuzzy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kota', 'indikator', 'rendah', 'tinggi', 'sangat_tinggi'], 'required'],
            [['id_kota'], 'integer'],
            [['rendah', 'tinggi', 'sangat_tinggi'], 'number'],
            [['indikator'], 'string', 'max' => 30],
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
            'rendah' => 'Rendah',
            'tinggi' => 'Tinggi',
            'sangat_tinggi' => 'Sangat Tinggi',
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
