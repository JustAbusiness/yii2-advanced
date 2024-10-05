<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string|null $email
 * @property string|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Companies extends \yii\db\ActiveRecord
{
     public $file;

     /**
      * {@inheritdoc}
      */
     public static function tableName()
     {
          return 'companies';
     }

     /**
      * {@inheritdoc}
      */
     public function rules()
     {
          return [
               [['name', 'address'], 'required'],
               [['created_at', 'updated_at'], 'safe'],
               [['file'], 'file', 'extensions' => 'jpg, png'],
               [['name', 'address', 'email', 'status', 'logo'], 'string', 'max' => 255],
          ];
     }

     /**
      * {@inheritdoc}
      */
     public function attributeLabels()
     {
          return [
               'id' => 'ID',
               'name' => 'Name',
               'address' => 'Address',
               'email' => 'Email',
               'status' => 'Status',
               'created_at' => 'Created At',
               'updated_at' => 'Updated At',
               'file' => 'Logo',
          ];
     }
}
