<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
     'id' => 'basic',
     'basePath' => dirname(__DIR__),
     'bootstrap' => ['log'],
     'aliases' => [
          '@bower' => '@vendor/bower-asset',
          '@npm' => '@vendor/npm-asset',
     ],
     'components' => [
          'request' => [
               // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
               'cookieValidationKey' => '5Lz68IHxlG4iwcf52t62lWKJBCHcWMyU',
          ],
          'authManager' => [
               'class' => 'yii\rbac\PhpManager',
          ],
          'cache' => [
               'class' => 'yii\caching\FileCache',
          ],
          'user' => [
               'identityClass' => 'app\models\User',
               'enableAutoLogin' => true,
          ],
          'errorHandler' => [
               'errorAction' => 'site/error',
          ],
          'mailer' => [
               'class' => \yii\symfonymailer\Mailer::class,
               'viewPath' => '@app/mail',
               // send all mails to a file by default.
               'useFileTransport' => true,
          ],
          'log' => [
               'traceLevel' => YII_DEBUG ? 3 : 0,
               'targets' => [
                    [
                         'class' => 'yii\log\FileTarget',
                         'levels' => ['error', 'warning'],
                    ],
               ],
          ],
          'db' => $db,
          'urlManager' => [
               'enablePrettyUrl' => true,
               'showScriptName' => false,
               'rules' => [
               ],
          ],
     ],
     'modules' => [
          'gridview' => [
               'class' => \kartik\grid\Module::class,
               'bsVersion' => '4.x', // or '3.x'
               // 'downloadAction' => 'gridview/export/download',
               // 'i18n' => [],
               // 'exportEncryptSalt' => 'tG85vd1',
          ],
          'settings' => ['class' => 'app\modules\settings\Settings',]
     ],
     'controllerMap' => [
          'file' => 'mdm\\upload\\FileController', // use to show or download file
     ],
//     'assetManager' => [
//          'bundles' => [
//               'yii\bootstrap4\BootstrapAsset' => [
//                    'sourcePath' => '@npm/bootstrap/dist', // Example for Bootstrap 4
//               ],
//          ],
//     ],
     'params' => $params,
];

if (YII_ENV_DEV) {
     // configuration adjustments for 'dev' environment
     $config['bootstrap'][] = 'debug';
     $config['modules']['debug'] = [
          'class' => 'yii\debug\Module',
          // uncomment the following to add your IP if you are not connecting from localhost.
          //'allowedIPs' => ['127.0.0.1', '::1'],
     ];

     $config['bootstrap'][] = 'gii';
     $config['modules']['gii'] = [
          'class' => 'yii\gii\Module',
          // uncomment the following to add your IP if you are not connecting from localhost.
          //'allowedIPs' => ['127.0.0.1', '::1'],
     ];
}

return $config;
