<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $password
 * @property string|null $auth_key
 * @property string|null $access_token
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
     /**
      * {@inheritdoc}
      */
     public static function tableName()
     {
          return 'user';
     }

     /**
      * {@inheritdoc}
      */
     public function rules()
     {
          return [
               [['username', 'password', 'auth_key', 'access_token'], 'string', 'max' => 255],
          ];
     }

     /**
      * {@inheritdoc}
      */
     public function attributeLabels()
     {
          return [
               'id' => 'ID',
               'username' => 'Username',
               'password' => 'Password',
               'auth_key' => 'Auth Key',
               'access_token' => 'Access Token',
          ];
     }


     public static function findIdentity($id)
     {
          return self::findOne($id);
     }

     /**
      * {@inheritdoc}
      */
     public static function findIdentityByAccessToken($token, $type = null)
     {
          return self::find()->where(['access_token' => $token])->one();
     }

     /**
      * Finds user by username
      *
      * @param string $username
      * @return static|null
      */
     public static function findByUsername($username)
     {
          return self::findOne(['username' => $username]);
     }

     /**
      * {@inheritdoc}
      */
     public function getId()
     {
          return $this->id;
     }

     /**
      * {@inheritdoc}
      */
     public function getAuthKey()
     {
          return $this->auth_key;
     }

     /**
      * {@inheritdoc}
      */
     public function validateAuthKey($authKey)
     {
          return $this->auth_key === $authKey;
     }

     /**
      * Validates password
      *
      * @param string $password password to validate
      * @return bool if password provided is valid for current user
      */
     public function validatePassword($password)
     {
          return Yii::$app->security->validatePassword($password, $this->password);
     }
}
