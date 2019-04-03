<?php

namespace backend\models;

use Yii;
use backend\models\VariabelKota;


/**
 * This is the model class for table "variabel_kota".
 *
 * @property integer $id
 * @property integer $id_kota
 * @property integer $tahun
 * @property integer $jumlah_murid_sma
 * @property integer $jumlah_penduduk_usia_sma
 * @property integer $jumlah_murid_usia_sma
 * @property integer $jumlah_gedung_sma
 * @property integer $jumlah_guru
 * @property integer $jumlah_kelas
 * @property integer $jumlah_ruang_kelas
 * @property integer $jumlah_ruang_kelas_baik
 * @property integer $jumlah_gurudg_profesi_mengajar
 * @property integer $jumlah_murid_baru
 * @property integer $jumlah_lulusan_sltp
 * @property integer $jumlah_murid_lulus_sma
 * @property integer $jumlah_murid_tingkat3
 * @property integer $jumlah_murid_mengulang
 *
 * @property Kota $idKota
 */
class VariabelKota extends \yii\db\ActiveRecord
{
    public $kota;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'variabel_kota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kota', 'tahun', 'jumlah_murid_sma', 'jumlah_penduduk_usia_sma', 'jumlah_murid_usia_sma', 'jumlah_gedung_sma', 'jumlah_guru', 'jumlah_kelas', 'jumlah_ruang_kelas', 'jumlah_ruang_kelas_baik', 'jumlah_gurudg_profesi_mengajar', 'jumlah_murid_baru', 'jumlah_lulusan_sltp', 'jumlah_murid_lulus_sma', 'jumlah_murid_tingkat3', 'jumlah_murid_mengulang', 'longitude', 'latitude'], 'required'],
            [['id_kota', 'tahun', 'jumlah_murid_sma', 'jumlah_penduduk_usia_sma', 'jumlah_murid_usia_sma', 'jumlah_gedung_sma', 'jumlah_guru', 'jumlah_kelas', 'jumlah_ruang_kelas', 'jumlah_ruang_kelas_baik', 'jumlah_gurudg_profesi_mengajar', 'jumlah_murid_baru', 'jumlah_lulusan_sltp', 'jumlah_murid_lulus_sma', 'jumlah_murid_tingkat3', 'jumlah_murid_mengulang'], 'integer'],
            [['longitude', 'latitude'], 'double'],
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
            'tahun' => 'Tahun',
            'jumlah_murid_sma' => 'Jumlah Murid SMA',
            'jumlah_penduduk_usia_sma' => 'Jumlah Penduduk Usia SMA',
            'jumlah_murid_usia_sma' => 'Jumlah Murid Usia SMA',
            'jumlah_gedung_sma' => 'Jumlah Gedung SMA',
            'jumlah_guru' => 'Jumlah Guru',
            'jumlah_kelas' => 'Jumlah Kelas',
            'jumlah_ruang_kelas' => 'Jumlah Ruang Kelas',
            'jumlah_ruang_kelas_baik' => 'Jumlah Ruang Kelas Baik',
            'jumlah_gurudg_profesi_mengajar' => 'Jumlah Guru dengan Profesi Mengajar',
            'jumlah_murid_baru' => 'Jumlah Murid Baru',
            'jumlah_lulusan_sltp' => 'Jumlah Lulusan SLTP',
            'jumlah_murid_lulus_sma' => 'Jumlah Murid Lulus SMA',
            'jumlah_murid_tingkat3' => 'Jumlah Murid Tingkat III',
            'jumlah_murid_mengulang' => 'Jumlah Murid Mengulang',
            'longitude' => 'Longitude',
            'latitide' => 'Latitude',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKota()
    {
        return $this->hasOne(Kota::className(), ['id' => 'id_kota']);
    }

    public function getIndikator()
    {
        return $this->hasOne(Indikator::className(), ['id_varkota' => 'id']);
    }
}
