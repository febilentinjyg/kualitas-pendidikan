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
            [['id', 'id_kota', 'tahun', 'jumlah_murid_sma', 'jumlah_penduduk_usia_sma', 'jumlah_murid_usia_sma', 'jumlah_gedung_sma', 'jumlah_guru', 'jumlah_kelas', 'jumlah_ruang_kelas', 'jumlah_ruang_kelas_baik', 'jumlah_gurudg_profesi_mengajar', 'jumlah_murid_baru', 'jumlah_lulusan_sltp', 'jumlah_murid_lulus_sma', 'jumlah_murid_tingkat3', 'jumlah_murid_mengulang'], 'integer'],
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
            'jumlah_murid_sma' => $this->jumlah_murid_sma,
            'jumlah_penduduk_usia_sma' => $this->jumlah_penduduk_usia_sma,
            'jumlah_murid_usia_sma' => $this->jumlah_murid_usia_sma,
            'jumlah_gedung_sma' => $this->jumlah_gedung_sma,
            'jumlah_guru' => $this->jumlah_guru,
            'jumlah_kelas' => $this->jumlah_kelas,
            'jumlah_ruang_kelas' => $this->jumlah_ruang_kelas,
            'jumlah_ruang_kelas_baik' => $this->jumlah_ruang_kelas_baik,
            'jumlah_gurudg_profesi_mengajar' => $this->jumlah_gurudg_profesi_mengajar,
            'jumlah_murid_baru' => $this->jumlah_murid_baru,
            'jumlah_lulusan_sltp' => $this->jumlah_lulusan_sltp,
            'jumlah_murid_lulus_sma' => $this->jumlah_murid_lulus_sma,
            'jumlah_murid_tingkat3' => $this->jumlah_murid_tingkat3,
            'jumlah_murid_mengulang' => $this->jumlah_murid_mengulang,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
        ])
        ->innerJoin('kota', 'kota.id = variabel_kota.id_kota')
        ->andFilterWhere([
            'like', 'kota.nama', $this->kota
        ]);

        return $dataProvider;
    }
}
