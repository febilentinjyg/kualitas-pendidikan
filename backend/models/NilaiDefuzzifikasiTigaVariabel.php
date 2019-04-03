<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\Query;


/**
 * This is the model class for table "nilai_defuzzifikasi_tiga_variabel".
 *
 * @property integer $id
 * @property integer $id_kota
 * @property double $defuzzifikasi_angka_partisipasi
 * @property double $defuzzifikasi_tingkat_pelayanan
 * @property double $defuzzifikasi_kualitas_output
 *
 * @property Kota $idKota
 */
class NilaiDefuzzifikasiTigaVariabel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nilai_defuzzifikasi_tiga_variabel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kota'], 'required'],
            [['id_kota'], 'integer'],
            [['defuzzifikasi_angka_partisipasi', 'defuzzifikasi_tingkat_pelayanan', 'defuzzifikasi_kualitas_output'], 'number'],
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
            'defuzzifikasi_angka_partisipasi' => 'Defuzzifikasi Angka Partisipasi',
            'defuzzifikasi_tingkat_pelayanan' => 'Defuzzifikasi Tingkat Pelayanan',
            'defuzzifikasi_kualitas_output' => 'Defuzzifikasi Kualitas Output',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKota()
    {
        return $this->hasOne(Kota::className(), ['id' => 'id_kota']);
    }

    // -------------------------------------------------------------------
    public function cariMinAp()
    {
        return self::find()->min('defuzzifikasi_angka_partisipasi');
        // return NilaiDefuzzifikasiTigaVariabel::find()->min('defuzzifikasi_angka_partisipasi');
    }

    public function cariMaxAp()
    {
        return self::find()->max('defuzzifikasi_angka_partisipasi');
        // return NilaiDefuzzifikasiTigaVariabel::find()->max('defuzzifikasi_angka_partisipasi');
    }

    public function ambilNilaiAp()
    {
        $query = Yii::$app->db->createCommand(' SELECT nilai_defuzzifikasi_tiga_variabel.defuzzifikasi_angka_partisipasi AS angka_partisipasi, kota.nama AS nama, kota.id AS id_kota from nilai_defuzzifikasi_tiga_variabel INNER JOIN kota on kota.id = nilai_defuzzifikasi_tiga_variabel.id_kota')->queryAll();
        return $query;
    }

    // -------------------------------------------------------------------
    public function cariMinTp()
    {
        return NilaiDefuzzifikasiTigaVariabel::find()->min('defuzzifikasi_tingkat_pelayanan');
    }

    public function cariMaxTp()
    {
        return NilaiDefuzzifikasiTigaVariabel::find()->max('defuzzifikasi_tingkat_pelayanan');
    }

    public function ambilNilaiTp()
    {
        $query = Yii::$app->db->createCommand(' SELECT nilai_defuzzifikasi_tiga_variabel.defuzzifikasi_tingkat_pelayanan AS tingkat_pelayanan, kota.nama AS nama, kota.id AS id_kota from nilai_defuzzifikasi_tiga_variabel INNER JOIN kota on kota.id = nilai_defuzzifikasi_tiga_variabel.id_kota')->queryAll();
        return $query;
    }

    // -------------------------------------------------------------------
    public function cariMinKo()
    {
        return NilaiDefuzzifikasiTigaVariabel::find()->min('defuzzifikasi_kualitas_output');
    }

    public function cariMaxKo()
    {
        return NilaiDefuzzifikasiTigaVariabel::find()->max('defuzzifikasi_kualitas_output');
    }

    public function ambilNilaiKo()
    {
        $query = Yii::$app->db->createCommand(' SELECT nilai_defuzzifikasi_tiga_variabel.defuzzifikasi_kualitas_output AS kualitas_output, kota.nama AS nama, kota.id AS id_kota from nilai_defuzzifikasi_tiga_variabel INNER JOIN kota on kota.id = nilai_defuzzifikasi_tiga_variabel.id_kota')->queryAll();
        return $query;
    }


}
