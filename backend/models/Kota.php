<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kota".
 *
 * @property integer $id
 * @property string $nama
 *
 * @property VariabelKota[] $variabelKotas
 */
class Kota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVariabelKotas()
    {
        return $this->hasMany(VariabelKota::className(), ['id_kota' => 'id']);
    }
}
