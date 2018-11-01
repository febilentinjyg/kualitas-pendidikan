<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Indikator;
use backend\models\VariabelKota;
use yii\db\Query;

/**
 * IndikatorSearch represents the model behind the search form about `backend\models\Indikator`.
 */
class IndikatorSearch extends Indikator
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tahun'], 'integer'],
            [['apk', 'apm', 'tingkat_pelayanan_sekolah', 'rasio_murid_guru', 'rasio_murid_sekolah', 'rasio_murid_kelas', 'rasio_kelas_ruang_kelas', 'ruang_kelas_baik', 'guru_layak_mengajar', 'angka_melanjutkan', 'angka_lulusan', 'angka_putus_sekolah', 'angka_mengulang', 'rasio_input_output'], 'number'],
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
        $query = Indikator::find();

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
            'tahun' => $this->tahun,
            'apk' => $this->apk,
            'apm' => $this->apm,
            'tingkat_pelayanan_sekolah' => $this->tingkat_pelayanan_sekolah,
            'rasio_murid_guru' => $this->rasio_murid_guru,
            'rasio_murid_sekolah' => $this->rasio_murid_sekolah,
            'rasio_murid_kelas' => $this->rasio_murid_kelas,
            'rasio_kelas_ruang_kelas' => $this->rasio_kelas_ruang_kelas,
            'ruang_kelas_baik' => $this->ruang_kelas_baik,
            'guru_layak_mengajar' => $this->guru_layak_mengajar,
            'angka_melanjutkan' => $this->angka_melanjutkan,
            'angka_lulusan' => $this->angka_lulusan,
            'angka_putus_sekolah' => $this->angka_putus_sekolah,
            'angka_mengulang' => $this->angka_mengulang,
            'rasio_input_output' => $this->rasio_input_output,
        ]);

        return $dataProvider;
    }
    public function createApk()
    {
        
        // compose the query
        $query = VariabelKota::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $dataProvider;
        
    }

     public function createApm()
    {
        
        // compose the query
        $query = VariabelKota::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $dataProvider;
        
    }

    public function createTps()
    {
        
        // compose the query
        $query = VariabelKota::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $dataProvider;
        
    }

    public function createRmg()
    {
        
        // compose the query
        $query = VariabelKota::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $dataProvider;
        
    }

    public function createRms()
    {
        
        // compose the query
        $query = VariabelKota::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $dataProvider;
        
    }

    public function createRmk()
    {
        
        // compose the query
        $query = VariabelKota::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $dataProvider;
        
    }

    public function createRkrk()
    {
        
        // compose the query
        $query = VariabelKota::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $dataProvider;
        
    }

    public function createRkb()
    {
        
        // compose the query
        $query = VariabelKota::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $dataProvider;
        
    }

    public function createGlm()
    {
        
        // compose the query
        $query = VariabelKota::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $dataProvider;
        
    }

    public function createAm()
    {
        
        // compose the query
        $query = VariabelKota::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $dataProvider;
        
    }

    public function createAl()
    {
        
        // compose the query
        $query = VariabelKota::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $dataProvider;
        
    }

    public function createAps()
    {
        
        // compose the query
        $query = VariabelKota::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $dataProvider;
        
    }

    public function createAu()
    {
        
        // compose the query
        $query = VariabelKota::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $dataProvider;
        
    }

    public function createRio()
    {
        
        // compose the query
        $query = VariabelKota::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $dataProvider;
        
    }
}
