<?php

namespace app\views\site;

use Yii;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

     <?php if (Yii::$app->session->hasFlash('success')) {
      echo Yii::$app->session->getFlash('success');
} ?>


     <?php $form = ActiveForm::begin(); ?>
     <?php echo $form->field($model, 'username'); ?>
     <?php echo $form->field($model, 'email'); ?>


<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']); ?>