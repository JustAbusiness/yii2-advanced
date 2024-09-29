<?php
/**
 * @Author: RobertPham0327 s3926681@rmit.edu.vn
 * @Date: 2024-09-07 12:58:59
 * @LastEditors: RobertPham0327 s3926681@rmit.edu.vn
 * @LastEditTime: 2024-09-07 18:07:47
 * @FilePath: models/FormUpload.php
 * @Description: 这是默认设置,可以在设置》工具》File Description中进行配置
 */


namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class FormUpload extends Model
{
     /**
      * @var UploadedFile
      */
     public $imageFile;

     public function rules()
     {
          return [
               [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
          ];
     }

     public function upload()
     {
          if ($this->validate()) {
               $path = 'uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
               if ($this->imageFile->saveAs($path)) {
                        return $path;
               }
          } else {
               return false;
          }
     }
}