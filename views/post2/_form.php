<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Post $model */
/** @var yii\widgets\ActiveForm $form */
/** @var app\models\FormUpload $formUpload */
?>

<div class="post-form">

     <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

     <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

     <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

     <?= $form->field($formUpload, 'imageFile')->fileInput() ?>

    <!--  Upload File -->
<!--     --><?php //= $form->field($model, 'file')->fileInput(); ?>
<!---->
<!--     --><?php //= Html::img(['/file', 'id' => $model->imageFile]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
