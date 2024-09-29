<?php
/**
 * @Author: RobertPham0327 s3926681@rmit.edu.vn
 * @Date: 2024-09-08 18:32:39
 * @LastEditors: RobertPham0327 s3926681@rmit.edu.vn
 * @LastEditTime: 2024-09-08 18:46:03
 * @FilePath: models/SingUpForm.php
 * @Description: 这是默认设置,可以在设置》工具》File Description中进行配置
 */


namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;

class SingUpForm extends Model
{
     public $username;
     public $password;
     public $password_repeat;

     public function rules()
     {
          return [
               [['username', 'password', 'password_repeat'], 'required'],
               ['username', 'string', 'min' => 4, 'max' => 255],
               ['password', 'string', 'min' => 6],
               ['password_repeat', 'compare', 'compareAttribute' => 'password'],
          ];
     }

     public function signup()
     {
          $user = new User();
          $user->username = $this->username;
          $user->password = Yii::$app->security->generatePasswordHash($this->password);
          $user->access_token = Yii::$app->security->generateRandomString();
          $user->auth_key = Yii::$app->security->generateRandomString();

          if ($user->save()) {
               return true;
          }

          Yii::error('Error when signup: ' . VarDumper::dumpAsString($user->errors));
          return false;
     }
}   