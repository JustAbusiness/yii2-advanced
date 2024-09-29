<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Post $model */
/** @var app\models\FormUpload $formUpload */

$this->title = Yii::t('app', 'Create Post');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
         'formUpload' => $formUpload,
    ]) ?>

</div>
