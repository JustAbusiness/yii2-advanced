<?php

namespace app\controllers;

use app\models\Companies;
use app\models\CompanySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CompanyController implements the CRUD actions for Companies model.
 */
class CompanyController extends Controller
{
     /**
      * @inheritDoc
      */
     public function behaviors()
     {
          return array_merge(
               parent::behaviors(),
               [
                    'verbs' => [
                         'class' => VerbFilter::className(),
                         'actions' => [
                              'delete' => ['POST'],
                         ],
                    ],
               ]
          );
     }

     /**
      * Lists all Companies models.
      *
      * @return string
      */
     public function actionIndex()
     {
          $searchModel = new CompanySearch();
          $dataProvider = $searchModel->search($this->request->queryParams);

          return $this->render('index', [
               'searchModel' => $searchModel,
               'dataProvider' => $dataProvider,
          ]);
     }

     /**
      * Displays a single Companies model.
      * @param int $id ID
      * @return string
      * @throws NotFoundHttpException if the model cannot be found
      */
     public function actionView($id)
     {
          return $this->render('view', [
               'model' => $this->findModel($id),
          ]);
     }

     /**
      * Creates a new Companies model.
      * If creation is successful, the browser will be redirected to the 'view' page.
      * @return string|\yii\web\Response
      */
     public function actionCreate()
     {
          $model = new Companies();

          if ($this->request->isPost) {
               if ($model->load($this->request->post())) {
                    // Get the instance of the uploaded file
                    $imageName = $model->name;
                    $model->file = UploadedFile::getInstances($model, 'file');
                    $model->file = $this->saveAs('uploads/' . $imageName . '.' . $model->file->extension);
                    // Save the uploaded image
                    $model->logo = '/uploads/' . $imageName . '.' . $model->file->extension;
                    $model->created_at = date('Y-m-d H:i:s');
                    $model->updated_at = date('Y-m-d H:i:s');
                    if ($model->save()) {
                         return $this->redirect(['view', 'id' => $model->id]);
                    }
               }
          } else {
               $model->loadDefaultValues();
          }

          return $this->render('create', [
               'model' => $model,
          ]);
     }

     /**
      * Updates an existing Companies model.
      * If update is successful, the browser will be redirected to the 'view' page.
      * @param int $id ID
      * @return string|\yii\web\Response
      * @throws NotFoundHttpException if the model cannot be found
      */
     public function actionUpdate($id)
     {
          $model = $this->findModel($id);

          if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
               return $this->redirect(['view', 'id' => $model->id]);
          }

          return $this->render('update', [
               'model' => $model,
          ]);
     }

     /**
      * Deletes an existing Companies model.
      * If deletion is successful, the browser will be redirected to the 'index' page.
      * @param int $id ID
      * @return \yii\web\Response
      * @throws NotFoundHttpException if the model cannot be found
      */
     public function actionDelete($id)
     {
          $this->findModel($id)->delete();

          return $this->redirect(['index']);
     }

     /**
      * Finds the Companies model based on its primary key value.
      * If the model is not found, a 404 HTTP exception will be thrown.
      * @param int $id ID
      * @return Companies the loaded model
      * @throws NotFoundHttpException if the model cannot be found
      */
     protected function findModel($id)
     {
          if (($model = Companies::findOne(['id' => $id])) !== null) {
               return $model;
          }

          throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
     }
}
