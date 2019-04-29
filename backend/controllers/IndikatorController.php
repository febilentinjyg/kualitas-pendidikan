<?php

namespace backend\controllers;

use Yii;
use backend\models\Indikator;
use backend\models\IndikatorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IndikatorController implements the CRUD actions for Indikator model.
 */
class IndikatorController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Indikator models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IndikatorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Indikator model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Indikator model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Indikator();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Indikator model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Indikator model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Indikator model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Indikator the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Indikator::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionCreateApk()
    {
        $searchModel = new IndikatorSearch();
        $dataProvider = $searchModel->createApk();
       foreach ($dataProvider->getModels() as $key => $value) {
        if($value->indikator){
           $indikator = $value->indikator;
       }
       else{
            $indikator = new Indikator();
            $indikator->id_varkota = $value->id;
       }
           $indikator->apk = $value->jumlah_murid_sma / $value->jumlah_penduduk_usia_sma * 100;
           $indikator->tahun = $value->tahun;
           $indikator->save();
       }

        return $this->render('index', [
            'active' => 'apk',
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreateApm()
    {
        $searchModel = new IndikatorSearch();
        $dataProvider = $searchModel->createApm();
       foreach ($dataProvider->getModels() as $key => $value) {
        if($value->indikator){
           $indikator = $value->indikator;
       }
       else{
            $indikator = new Indikator();
            $indikator->id_varkota = $value->id;
       }
           $indikator->apm = $value->jumlah_murid_usia_sma / $value->jumlah_penduduk_usia_sma * 100;
           $indikator->save();
       }
        return $this->render('index', [
            'active' => 'apm',
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    // public function actionCreateTps()
    // {
    //     $searchModel = new IndikatorSearch();
    //     $dataProvider = $searchModel->createTps();
    //     foreach ($dataProvider->getModels() as $key => $value) {
    //     if($value->indikator){
    //        $indikator = $value->indikator;
    //    }
    //    else{
    //         $indikator = new Indikator();
    //         $indikator->id_varkota = $value->id;
    //    }
    //        $indikator->tingkat_pelayanan_sekolah = $value->jumlah_penduduk_usia_sma / $value->jumlah_gedung_sma;
    //        $indikator->save();
    //    }
    //     return $this->render('index', [
    //         'active' => 'tps',
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }

    public function actionCreateRmg()
    {
        $searchModel = new IndikatorSearch();
        $dataProvider = $searchModel->createRmg();
        foreach ($dataProvider->getModels() as $key => $value) {
        if($value->indikator){
           $indikator = $value->indikator;
       }
       else{
            $indikator = new Indikator();
            $indikator->id_varkota = $value->id;
       }
           $indikator->rasio_murid_guru = $value->jumlah_murid_sma / $value->jumlah_guru;
           $indikator->save();
       }
        return $this->render('index', [
            'active' => 'rmg',
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreateRms()
    {
        $searchModel = new IndikatorSearch();
        $dataProvider = $searchModel->createRms();
        foreach ($dataProvider->getModels() as $key => $value) {
        if($value->indikator){
           $indikator = $value->indikator;
       }
       else{
            $indikator = new Indikator();
            $indikator->id_varkota = $value->id;
       }
           $indikator->rasio_murid_sekolah = $value->jumlah_murid_sma / $value->jumlah_sekolah;
           $indikator->save();
       }
        return $this->render('index', [
            'active' => 'rms',
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreateRmk()
    {
        $searchModel = new IndikatorSearch();
        $dataProvider = $searchModel->createRmk();
        foreach ($dataProvider->getModels() as $key => $value) {
        if($value->indikator){
           $indikator = $value->indikator;
       }
       else{
            $indikator = new Indikator();
            $indikator->id_varkota = $value->id;
       }
           $indikator->rasio_murid_kelas = $value->jumlah_murid_sma / $value->jumlah_kelas;
           $indikator->save();
       }
        return $this->render('index', [
            'active' => 'rmk',
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreateRkrk()
    {
        $searchModel = new IndikatorSearch();
        $dataProvider = $searchModel->createRkrk();
        foreach ($dataProvider->getModels() as $key => $value) {
        if($value->indikator){
           $indikator = $value->indikator;
       }
       else{
            $indikator = new Indikator();
            $indikator->id_varkota = $value->id;
       }
           $indikator->rasio_kelas_ruang_kelas = $value->jumlah_kelas / $value->jumlah_ruang_kelas;
           $indikator->save();
       }
        return $this->render('index', [
            'active' => 'rkrk',
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreatePrkb()
    {
        $searchModel = new IndikatorSearch();
        $dataProvider = $searchModel->createPrkb();
        foreach ($dataProvider->getModels() as $key => $value) {
        if($value->indikator){
           $indikator = $value->indikator;
       }
       else{
            $indikator = new Indikator();
            $indikator->id_varkota = $value->id;
       }
           $indikator->persentase_ruang_kelas_baik = $value->jumlah_ruang_kelas_baik / $value->jumlah_ruang_kelas * 100;
           $indikator->save();
       }
        return $this->render('index', [
            'active' => 'prkb',
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreatePglm()
    {
        $searchModel = new IndikatorSearch();
        $dataProvider = $searchModel->createPglm();
        foreach ($dataProvider->getModels() as $key => $value) {
        if($value->indikator){
           $indikator = $value->indikator;
       }
       else{
            $indikator = new Indikator();
            $indikator->id_varkota = $value->id;
       }
           $indikator->persentase_guru_layak_mengajar = $value->jumlah_guru_layak_mengajar / $value->jumlah_guru * 100;
           $indikator->save();
       }
        return $this->render('index', [
            'active' => 'pglm',
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreateAm()
    {
        $searchModel = new IndikatorSearch();
        $dataProvider = $searchModel->createAm();
        foreach ($dataProvider->getModels() as $key => $value) {
        if($value->indikator){
           $indikator = $value->indikator;
       }
       else{
            $indikator = new Indikator();
            $indikator->id_varkota = $value->id;
       }
           $indikator->angka_melanjutkan = $value->jumlah_murid_baru_tingkat1 / $value->jumlah_murid_smp_tingkat3_ts * 100;
           $indikator->save();
       }
        return $this->render('index', [
            'active' => 'am',
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreateAl()
    {
        $searchModel = new IndikatorSearch();
        $dataProvider = $searchModel->createAl();
        foreach ($dataProvider->getModels() as $key => $value) {
        if($value->indikator){
           $indikator = $value->indikator;
       }
       else{
            $indikator = new Indikator();
            $indikator->id_varkota = $value->id;
       }
           $indikator->angka_lulusan = $value->jumlah_murid_lulus_sma / $value->jumlah_murid_tingkat3 * 100;
           $indikator->save();
       }
        return $this->render('index', [
            'active' => 'al',
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreateAps()
    {
        $searchModel = new IndikatorSearch();
        $dataProvider = $searchModel->createAps();
        foreach ($dataProvider->getModels() as $key => $value) {
        if($value->indikator){
           $indikator = $value->indikator;
       }
       else{
            $indikator = new Indikator();
            $indikator->id_varkota = $value->id;
       }
           $indikator->angka_putus_sekolah = $value->jumlah_murid_putus_sekolah / $value->jumlah_murid_sma_ts * 100;
           $indikator->save();
       }
        return $this->render('index', [
            'active' => 'aps',
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreateAu()
    {
        $searchModel = new IndikatorSearch();
        $dataProvider = $searchModel->createAu();
        foreach ($dataProvider->getModels() as $key => $value) {
        if($value->indikator){
           $indikator = $value->indikator;
       }
       else{
            $indikator = new Indikator();
            $indikator->id_varkota = $value->id;
       }
           $indikator->angka_mengulang = $value->jumlah_murid_mengulang / $value->jumlah_murid_sma_ts * 100;
           $indikator->save();
       }
        return $this->render('index', [
            'active' => 'au',
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreateRio()
    {
        $searchModel = new IndikatorSearch();
        $dataProvider = $searchModel->createRio();
        foreach ($dataProvider->getModels() as $key => $value) {
        if($value->indikator){
           $indikator = $value->indikator;
       }
       else{
            $indikator = new Indikator();
            $indikator->id_varkota = $value->id;
       }
           $indikator->rasio_input_output = $value->jumlah_murid_lulus_sma / $value->jumlah_murid_baru_tingkat1;
           $indikator->save();
       }
        return $this->render('index', [
            'active' => 'rio',
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
