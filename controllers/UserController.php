<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UserForm;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class UserController extends Controller
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
      * Lists all Article models.
      *
      * @return string
      */
     public function actionIndex()
     {
//          $searchModel = new UserSearch();
//          $dataProvider = $searchModel->search($this->request->queryParams);
//
//          return $this->render('index', [
//               'searchModel' => $searchModel,
//               'dataProvider' => $dataProvider,
//          ]);
          $users = User::find()->all();
         return $this->render('index', ['users' => $users]);
     }

     /**
      * Displays a single Article model.
      * @param int $id ID
      * @return string
      * @throws NotFoundHttpException if the model cannot be found
      */
     public function actionView($slug)
     {
          return $this->render('view', [
               'model' => $this->findModel($slug),
          ]);
     }

     /**
      * Creates a new Article model.
      * If creation is successful, the browser will be redirected to the 'view' page.
      * @return string|\yii\web\Response
      */
     public function actionCreate()
     {
          $model = new Article();

          if ($this->request->isPost) {
               if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'slug' => $model->slug]);
               }
          } else {
               $model->loadDefaultValues();
          }

          return $this->render('create', [
               'model' => $model,
          ]);
     }

     /**
      * Updates an existing Article model.
      * If update is successful, the browser will be redirected to the 'view' page.
      * @param int $slug ID
      * @return string|\yii\web\Response
      * @throws NotFoundHttpException if the model cannot be found
      */
     public function actionUpdate($slug)
     {
          $model = $this->findModel($slug);

          if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
               return $this->redirect(['view', 'slug' => $model->slug]);
          }

          return $this->render('update', [
               'model' => $model,
          ]);
     }

     /**
      * Deletes an existing Article model.
      * If deletion is successful, the browser will be redirected to the 'index' page.
      * @param int $slug ID
      * @return \yii\web\Response
      * @throws NotFoundHttpException if the model cannot be found
      */
     public function actionDelete($slug)
     {
          $this->findModel($slug)->delete();

          return $this->redirect(['index']);
     }

     /**
      * Finds the Article model based on its primary key value.
      * If the model is not found, a 404 HTTP exception will be thrown.
      * @param int $slug ID
      * @return Article the loaded model
      * @throws NotFoundHttpException if the model cannot be found
      */
     protected function findModel($slug)
     {
          if (($model = Article::findOne(['slug' => $slug])) !== null) {
               return $model;
          }

          throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
     }
}
