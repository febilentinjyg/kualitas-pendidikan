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
            [['apk', 'apm', 'tingkat_pelayanan_sekolah', 'rasio_murid_guru', 'rasio_murid_sekolah', 'rasio_murid_kelas', 'rasio_kelas_ruang_kelas', 'persentase_ruang_kelas_baik', 'persentase_guru_layak_mengajar', 'angka_melanjutkan', 'angka_lulusan', 'angka_putus_sekolah', 'angka_mengulang', 'rasio_input_output'], 'number'],
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
            'persentase_ruang_kelas_baik' => $this->persentase_ruang_kelas_baik,
            'persentase_guru_layak_mengajar' => $this->persentase_guru_layak_mengajar,
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

    public function createPrkb()
    {
        
        // compose the query
        $query = VariabelKota::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $dataProvider;
        
    }

    public function createPglm()
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
// -------------------------------------------------------------------
    public function cariMinApk()
    {
        return Indikator::find()->min('apk');
    }

    public function cariMaxApk()
    {
        return Indikator::find()->max('apk');
    }

    public function ambilNilaiApk()
    {
        $query = Yii::$app->db->createCommand(' SELECT indikator.apk AS apk, kota.nama AS nama from indikator INNER JOIN variabel_kota on indikator.id_varkota = variabel_kota.id INNER JOIN kota on kota.id = variabel_kota.id_kota')->queryAll();
        return $query;
    }
// -------------------------------------------------------------------

    public function cariMinApm()
    {
        return Indikator::find()->min('apm');
    }

    public function cariMaxApm()
    {
        return Indikator::find()->max('apm');
    }

    public function ambilNilaiApm()
    {
        $query = Yii::$app->db->createCommand(' SELECT indikator.apm AS apm, kota.nama AS nama from indikator INNER JOIN variabel_kota on indikator.id_varkota = variabel_kota.id INNER JOIN kota on kota.id = variabel_kota.id_kota')->queryAll();
        return $query;
    }

    // -------------------------------------------------------------------

    public function cariMinTps()
    {
        return Indikator::find()->min('tingkat_pelayanan_sekolah');
    }

    public function cariMaxTps()
    {
        return Indikator::find()->max('tingkat_pelayanan_sekolah');
    }

    public function ambilNilaiTps()
    {
        $query = Yii::$app->db->createCommand(' SELECT indikator.tingkat_pelayanan_sekolah AS tps, kota.nama AS nama from indikator INNER JOIN variabel_kota on indikator.id_varkota = variabel_kota.id INNER JOIN kota on kota.id = variabel_kota.id_kota')->queryAll();
        return $query;
    }

    // -------------------------------------------------------------------

    public function cariMinRmg()
    {
        return Indikator::find()->min('rasio_murid_guru');
    }

    public function cariMaxRmg()
    {
        return Indikator::find()->max('rasio_murid_guru');
    }

    public function ambilNilaiRmg()
    {
        $query = Yii::$app->db->createCommand(' SELECT indikator.rasio_murid_guru AS rmg, kota.nama AS nama from indikator INNER JOIN variabel_kota on indikator.id_varkota = variabel_kota.id INNER JOIN kota on kota.id = variabel_kota.id_kota')->queryAll();
        return $query;
    }

    // -------------------------------------------------------------------

    public function cariMinRms()
    {
        return Indikator::find()->min('rasio_murid_sekolah');
    }

    public function cariMaxRms()
    {
        return Indikator::find()->max('rasio_murid_sekolah');
    }

    public function ambilNilaiRms()
    {
        $query = Yii::$app->db->createCommand(' SELECT indikator.rasio_murid_sekolah AS rms, kota.nama AS nama from indikator INNER JOIN variabel_kota on indikator.id_varkota = variabel_kota.id INNER JOIN kota on kota.id = variabel_kota.id_kota')->queryAll();
        return $query;
    }
    // -------------------------------------------------------------------

    public function cariMinRmk()
    {
        return Indikator::find()->min('rasio_murid_kelas');
    }

    public function cariMaxRmk()
    {
        return Indikator::find()->max('rasio_murid_kelas');
    }

    public function ambilNilaiRmk()
    {
        $query = Yii::$app->db->createCommand(' SELECT indikator.rasio_murid_kelas AS rmk, kota.nama AS nama from indikator INNER JOIN variabel_kota on indikator.id_varkota = variabel_kota.id INNER JOIN kota on kota.id = variabel_kota.id_kota')->queryAll();
        return $query;
    }
    // -------------------------------------------------------------------

    public function cariMinRkrk()
    {
        return Indikator::find()->min('rasio_kelas_ruang_kelas');
    }

    public function cariMaxRkrk()
    {
        return Indikator::find()->max('rasio_kelas_ruang_kelas');
    }

    public function ambilNilaiRkrk()
    {
        $query = Yii::$app->db->createCommand(' SELECT indikator.rasio_kelas_ruang_kelas AS rkrk, kota.nama AS nama from indikator INNER JOIN variabel_kota on indikator.id_varkota = variabel_kota.id INNER JOIN kota on kota.id = variabel_kota.id_kota')->queryAll();
        return $query;
    }
    // -------------------------------------------------------------------

    public function cariMinPrkb()
    {
        return Indikator::find()->min('persentase_ruang_kelas_baik');
    }

    public function cariMaxPrkb()
    {
        return Indikator::find()->max('persentase_ruang_kelas_baik');
    }

    public function ambilNilaiPrkb()
    {
        $query = Yii::$app->db->createCommand(' SELECT indikator.persentase_ruang_kelas_baik AS prkb, kota.nama AS nama from indikator INNER JOIN variabel_kota on indikator.id_varkota = variabel_kota.id INNER JOIN kota on kota.id = variabel_kota.id_kota')->queryAll();
        return $query;
    }
    // -------------------------------------------------------------------

    public function cariMinPglm()
    {
        return Indikator::find()->min('persentase_guru_layak_mengajar');
    }

    public function cariMaxPglm()
    {
        return Indikator::find()->max('persentase_guru_layak_mengajar');
    }

    public function ambilNilaiPglm()
    {
        $query = Yii::$app->db->createCommand(' SELECT indikator.persentase_guru_layak_mengajar AS pglm, kota.nama AS nama from indikator INNER JOIN variabel_kota on indikator.id_varkota = variabel_kota.id INNER JOIN kota on kota.id = variabel_kota.id_kota')->queryAll();
        return $query;
    }
    // -------------------------------------------------------------------

    public function cariMinAm()
    {
        return Indikator::find()->min('angka_melanjutkan');
    }

    public function cariMaxAm()
    {
        return Indikator::find()->max('angka_melanjutkan');
    }

    public function ambilNilaiAm()
    {
        $query = Yii::$app->db->createCommand(' SELECT indikator.angka_melanjutkan AS am, kota.nama AS nama from indikator INNER JOIN variabel_kota on indikator.id_varkota = variabel_kota.id INNER JOIN kota on kota.id = variabel_kota.id_kota')->queryAll();
        return $query;
    }
    // -------------------------------------------------------------------

    public function cariMinAl()
    {
        return Indikator::find()->min('angka_lulusan');
    }

    public function cariMaxAl()
    {
        return Indikator::find()->max('angka_lulusan');
    }

    public function ambilNilaiAl()
    {
        $query = Yii::$app->db->createCommand(' SELECT indikator.angka_lulusan AS al, kota.nama AS nama from indikator INNER JOIN variabel_kota on indikator.id_varkota = variabel_kota.id INNER JOIN kota on kota.id = variabel_kota.id_kota')->queryAll();
        return $query;
    }
    // -------------------------------------------------------------------

    public function cariMinAps()
    {
        return Indikator::find()->min('angka_putus_sekolah');
    }

    public function cariMaxAps()
    {
        return Indikator::find()->max('angka_putus_sekolah');
    }

    public function ambilNilaiAps()
    {
        $query = Yii::$app->db->createCommand(' SELECT indikator.angka_putus_sekolah AS aps, kota.nama AS nama from indikator INNER JOIN variabel_kota on indikator.id_varkota = variabel_kota.id INNER JOIN kota on kota.id = variabel_kota.id_kota')->queryAll();
        return $query;
    }
    // -------------------------------------------------------------------

    public function cariMinAu()
    {
        return Indikator::find()->min('angka_mengulang');
    }

    public function cariMaxAu()
    {
        return Indikator::find()->max('angka_mengulang');
    }

    public function ambilNilaiAu()
    {
        $query = Yii::$app->db->createCommand(' SELECT indikator.angka_mengulang AS au, kota.nama AS nama from indikator INNER JOIN variabel_kota on indikator.id_varkota = variabel_kota.id INNER JOIN kota on kota.id = variabel_kota.id_kota')->queryAll();
        return $query;
    }
    // -------------------------------------------------------------------

    public function cariMinRio()
    {
        return Indikator::find()->min('rasio_input_output');
    }

    public function cariMaxRio()
    {
        return Indikator::find()->max('rasio_input_output');
    }

    public function ambilNilaiRio()
    {
        $query = Yii::$app->db->createCommand(' SELECT indikator.rasio_input_output AS rio, kota.nama AS nama from indikator INNER JOIN variabel_kota on indikator.id_varkota = variabel_kota.id INNER JOIN kota on kota.id = variabel_kota.id_kota')->queryAll();
        return $query;
    }
}
