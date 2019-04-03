<?php

namespace backend\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\VariabelKota;
use yii\db\Query;


/**
 * This is the model class for table "indikator".
 *
 * @property integer $id
 * @property integer $tahun
 * @property double $apk
 * @property double $apm
 * @property double $tingkat_pelayanan_sekolah
 * @property double $rasio_murid_guru
 * @property double $rasio_murid_sekolah
 * @property double $rasio_murid_kelas
 * @property double $rasio_kelas_ruang_kelas
 * @property double $ruang_kelas_baik
 * @property double $guru_layak_mengajar
 * @property double $angka_melanjutkan
 * @property double $angka_lulusan
 * @property double $angka_putus_sekolah
 * @property double $angka_mengulang
 * @property double $rasio_input_output
 */
class Indikator extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'indikator';
    }

    public function getVarKota()
    {
        return $this->hasOne(VariabelKota::className(), ['id' => 'id_varkota']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['tahun', 'apk', 'apm', 'tingkat_pelayanan_sekolah', 'rasio_murid_guru', 'rasio_murid_sekolah', 'rasio_murid_kelas', 'rasio_kelas_ruang_kelas', 'ruang_kelas_baik', 'guru_layak_mengajar', 'angka_melanjutkan', 'angka_lulusan', 'angka_putus_sekolah', 'angka_mengulang', 'rasio_input_output'], 'required'],
            [['tahun'], 'integer'],
            [['apk', 'apm', 'tingkat_pelayanan_sekolah', 'rasio_murid_guru', 'rasio_murid_sekolah', 'rasio_murid_kelas', 'rasio_kelas_ruang_kelas', 'persentase_ruang_kelas_baik', 'persentase_guru_layak_mengajar', 'angka_melanjutkan', 'angka_lulusan', 'angka_putus_sekolah', 'angka_mengulang', 'rasio_input_output'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tahun' => 'Tahun',
            'apk' => 'Apk',
            'apm' => 'Apm',
            'tingkat_pelayanan_sekolah' => 'Tingkat Pelayanan Sekolah',
            'rasio_murid_guru' => 'Rasio Murid Guru',
            'rasio_murid_sekolah' => 'Rasio Murid Sekolah',
            'rasio_murid_kelas' => 'Rasio Murid Kelas',
            'rasio_kelas_ruang_kelas' => 'Rasio Kelas Ruang Kelas',
            'persentase_ruang_kelas_baik' => 'Persentase Ruang Kelas Baik',
            'persentase_guru_layak_mengajar' => 'Persentase Guru Layak Mengajar',
            'angka_melanjutkan' => 'Angka Melanjutkan',
            'angka_lulusan' => 'Angka Lulusan',
            'angka_putus_sekolah' => 'Angka Putus Sekolah',
            'angka_mengulang' => 'Angka Mengulang',
            'rasio_input_output' => 'Rasio Input Output',
            'id_varkota' => 'ID Variabel Kota',
        ];
    }

    
}
