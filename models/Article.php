<?php

namespace app\models;

use Yii;
use yii\helpers\Html;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $title
 * @property string|null $slug
 * @property string $body
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class Article extends \yii\db\ActiveRecord
{
     /**
      * {@inheritdoc}
      */
     public static function tableName()
     {
          return 'article';
     }

     public function behaviors()
     {
          return [
               TimestampBehavior::class,
               [
                    'class' => BlameableBehavior::class,
                    'updatedByAttribute' => false,
               ],
               [
                    'class' => SluggableBehavior::class,
                    'attribute' => 'title',
               ]
          ];
     }

     /**
      * {@inheritdoc}
      */
     public function rules()
     {
          return [
               [['title', 'body'], 'required'],
               [['body'], 'string'],
               [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
               [['title'], 'string', 'max' => 255],
               [['slug'], 'string', 'max' => 128],
               [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
               [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
          ];
     }

     /**
      * {@inheritdoc}
      */
     public function attributeLabels()
     {
          return [
               'id' => 'ID',
               'title' => 'Title',
               'slug' => 'Slug',
               'body' => 'Body',
               'created_at' => 'Created At',
               'updated_at' => 'Updated At',
               'created_by' => 'Created By',
               'updated_by' => 'Updated By',
          ];
     }

     /**
      * Gets query for [[CreatedBy]].
      *
      * @return \yii\db\ActiveQuery
      */
     public function getCreatedBy()
     {
          return $this->hasOne(User::class, ['id' => 'created_by']);
     }

     /**
      * Gets query for [[UpdatedBy]].
      *
      * @return \yii\db\ActiveQuery
      */
     public function getUpdatedBy()
     {
          return $this->hasOne(User::class, ['id' => 'updated_by']);
     }

     public function getEncodedBody()
     {
          return Html::encode($this->body);
     }
}
