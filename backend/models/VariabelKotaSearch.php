<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\VariabelKota;

/**
 * VariabelKotaSearch represents the model behind the search form about `backend\models\VariabelKota`.
 */
class VariabelKotaSearch extends VariabelKota
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_kota', 'tahun', 'jumlah_murid_usia_sma', 'jumlah_penduduk_usia_sma', 'jumlah_murid_sma', 'jumlah_murid_smp_tingkat3_ts', 'jumlah_murid_baru_tingkat1', 'jumlah_sekolah', 'jumlah_kelas', 'jumlah_ruang_kelas', 'jumlah_murid_mengulang', 'jumlah_murid_sma_ts', 'jumlah_murid_putus_sekolah', 'jumlah_murid_lulus_sma', 'jumlah_murid_ikut_ujian', 'jumlah_guru_layak_mengajar', 'jumlah_guru', 'jumlah_ruang_kelas_baik'], 'integer'],
            [['longitude', 'latitude'], 'double'],
            [['kota'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = VariabelKota::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_kota' => $this->id_kota,
            'tahun' => $this->tahun,
            'jumlah_murid_usia_sma' => $this->jumlah_murid_usia_sma,
            'jumlah_penduduk_usia_sma' => $this->jumlah_penduduk_usia_sma,
            'jumlah_murid_sma' => $this->jumlah_murid_sma,
            'jumlah_murid_smp_tingkat3_ts' => $this->jumlah_murid_smp_tingkat3_ts,
            'jumlah_murid_baru_tingkat1' => $this->jumlah_murid_baru_tingkat1,
            'jumlah_sekolah' => $this->jumlah_sekolah,
            'jumlah_kelas' => $this->jumlah_kelas,
            'jumlah_ruang_kelas' => $this->jumlah_ruang_kelas,
            'jumlah_murid_mengulang' => $this->jumlah_murid_mengulang,
            'jumlah_murid_sma_ts' => $this->jumlah_murid_sma_ts,
            'jumlah_murid_putus_sekolah' => $this->jumlah_murid_putus_sekolah,
            'jumlah_murid_lulus_sma' => $this->jumlah_murid_lulus_sma,
            'jumlah_murid_ikut_ujian' => $this->jumlah_murid_ikut_ujian,
            'jumlah_guru_layak_mengajar' => $this->jumlah_guru_layak_mengajar,
            'jumlah_guru' => $this->jumlah_guru,
            'jumlah_ruang_kelas_baik' => $this->jumlah_ruang_kelas_baik,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
        ])
        ->innerJoin('kota', 'kota.id = variabel_kota_baru.id_kota')
        ->andFilterWhere([
            'like', 'kota.nama', $this->kota
        ]);

        return $dataProvider;
    }
}
