<?php

namespace app\controllers;

use app\models\FormUpload;
use app\models\UserForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;
use app\models\Post;
use app\models\SingUpForm;

class SiteController extends Controller
{
     /**
      * {@inheritdoc}
      */
     public function behaviors()
     {
          return [
               'access' => [
                    'class' => AccessControl::class,
                    'only' => ['logout'],
                    'rules' => [
                         [
                              'actions' => ['logout'],
                              'allow' => true,
                              'roles' => ['@'],
                         ],
                    ],
               ],
               'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                         'logout' => ['post'],
                    ],
               ],
          ];
     }

     /**
      * {@inheritdoc}
      */
     public function actions()
     {
          return [
               'error' => [
                    'class' => 'yii\web\ErrorAction',
               ],
               'captcha' => [
                    'class' => 'yii\captcha\CaptchaAction',
                    'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
               ],
          ];
     }

     /**
      * Displays homepage.
      *
      * @return string
      */
     public function actionIndex()
     {
          return $this->render('index');
     }

     public function actionOtherIndex()
     {
          Yii::$app->MyComponent->welcome();
          die();
     }
     /**
      * Login action.
      *
      * @return Response|string
      */
     public function actionLogin()
     {
          if (!Yii::$app->user->isGuest) {
               return $this->goHome();
          }

          $model = new LoginForm();
          if ($model->load(Yii::$app->request->post()) && $model->login()) {
               return $this->goBack();
          }

          $model->password = '';
          return $this->render('login', [
               'model' => $model,
          ]);
     }

     public function actionSignup()
     {
          $model = new SingUpForm();
          if ($model->load(Yii::$app->request->post()) && $model->signup()) {
               return $this->goHome();
          }

          return $this->render('signup', [
               'model' => $model,
          ]);
     }

     /**
      * Logout action.
      *
      * @return Response
      */
     public function actionLogout()
     {
          Yii::$app->user->logout();

          return $this->goHome();
     }

     /**
      * Displays contact page.
      *
      * @return Response|string
      */
     public function actionContact()
     {
          $model = new ContactForm();
          if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
               Yii::$app->session->setFlash('contactFormSubmitted');

               return $this->refresh();
          }
          return $this->render('contact', [
               'model' => $model,
          ]);
     }

     /**
      * Displays about page.
      *
      * @return string
      */
     public function actionAbout()
     {
          return $this->render('about');
     }

     public function actionUser()
     {
          $model = new UserForm();
          if ($model->load(Yii::$app->request->post()) && $model->validate()) {
               Yii::$app->session->setFlash('success', 'You have entered the data correctly');
          }
          return $this->render('userForm', ['model' => $model]);
     }


//     public function actionUpload()
//     {
//          $model = new Post();
//          $formUpload = new FormUpload();
//
//
//          if (Yii::$app->request->isPost) {
//               if ($model->load(Yii::$app->request->post())) {
//                    $formUpload->imageFile = UploadedFile::getInstance($formUpload, 'imageFile');
//
//                    if ($model->save() && $model->upload()) {
//                         return $this->redirect(['view', 'id' => $model->id]);
//                    }
//               }
//
//          }
//
//          return $this->render('post/create', ['model' => $model, 'formUpload' => $formUpload]);
//     }
}
