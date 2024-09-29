<?php

namespace app\models;

use yii\base\Model;

class UserForm extends Model
{
     public $username;
     public $email;


     public function rules()
     {
          return [
               [['username', 'email'], 'required'],
               ['email', 'email'],
          ];
     }
}