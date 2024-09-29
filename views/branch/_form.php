<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/** @var yii\web\View $this */
/** @var app\models\Branches $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="branches-form">

     <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'company_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Companies::find()->all(), 'id', 'name'), ['prompt' => 'Select Company']) ?>

     <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'status')->dropDownList(['active' => 'Active', 'inactive' => 'Inactive']) ?>

    <div class="form-group">
         <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

     <?php ActiveForm::end(); ?>

</div>
