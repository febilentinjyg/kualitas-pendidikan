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
 * @property integer $jumlah_sekolah
 * @property integer $jumlah_guru
 * @property integer $jumlah_kelas
 * @property integer $jumlah_ruang_kelas
 * @property integer $jumlah_ruang_kelas_baik
 * @property integer $jumlah_gurudg_profesi_mengajar
 * @property integer $jumlah_murid_baru
 * @property integer $jumlah_lulusan_sltp
 * @property integer $jumlah_murid_lulus_sma
 * @property integer $jumlah_murid_ikut ujian
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
        return 'variabel_kota_baru';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kota', 'tahun', 'jumlah_murid_usia_sma', 'jumlah_penduduk_usia_sma', 'jumlah_murid_sma', 'jumlah_murid_smp_tingkat3_ts', 'jumlah_murid_baru_tingkat1', 'jumlah_sekolah', 'jumlah_kelas', 'jumlah_ruang_kelas', 'jumlah_murid_mengulang', 'jumlah_murid_sma_ts', 'jumlah_murid_putus_sekolah', 'jumlah_murid_lulus_sma', 'jumlah_murid_ikut_ujian', 'jumlah_guru_layak_mengajar', 'jumlah_guru', 'jumlah_ruang_kelas_baik', 'longitude', 'latitude'], 'required'],
            [['id_kota', 'tahun', 'jumlah_murid_usia_sma', 'jumlah_penduduk_usia_sma', 'jumlah_murid_sma', 'jumlah_murid_smp_tingkat3_ts', 'jumlah_murid_baru_tingkat1', 'jumlah_sekolah', 'jumlah_kelas', 'jumlah_ruang_kelas', 'jumlah_murid_mengulang', 'jumlah_murid_sma_ts', 'jumlah_murid_putus_sekolah', 'jumlah_murid_lulus_sma', 'jumlah_murid_ikut_ujian', 'jumlah_guru_layak_mengajar', 'jumlah_guru', 'jumlah_ruang_kelas_baik'], 'integer'],
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
            'jumlah_murid_usia_sma' => 'Jumlah Murid Usia SMA',
            'jumlah_penduduk_usia_sma' => 'Jumlah Penduduk Usia SMA',
            'jumlah_murid_sma' => 'Jumlah MUrid SMA',
            'jumlah_murid_smp_tingkat3_ts' => 'Jumlah Murid SMP Tingkat III Tahun Sebelumnya',
            'jumlah_murid_baru_tingkat1' => 'Jumlah Murid Baru Tingkat I',
            'jumlah_sekolah' => 'Jumlah Sekolah',
            'jumlah_kelas' => 'Jumlah Kelas',
            'jumlah_ruang_kelas' => 'Jumlah Ruang Kelas',
            'jumlah_murid_mengulang' => 'Jumlah Murid Mengulang',
            'jumlah_murid_sma_ts' => 'Jumlah Murid SMA Tahun Sebelumnya',
            'jumlah_murid_putus_sekolah' => 'Jumlah Murid Putus Sekolah',
            'jumlah_murid_lulus_sma' => 'Jumlah Murid Lulus SMA',
            'jumlah_murid_ikut_ujian' => 'Jumlah Murid Ikut Ujian UNAS',
            'jumlah_guru_layak_mengajar' => 'Jumlah Guru Layak Mengajar',
            'jumlah_guru' => 'Jumlah Guru',
            'jumlah_ruang_kelas_baik' => 'Jumlah Ruang Kelas Baik',
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

    public function getKota() {
        return $this->idKota->nama;
    }

    public function getIndikator()
    {
        return $this->hasOne(Indikator::className(), ['id_varkota' => 'id']);
    }
}
