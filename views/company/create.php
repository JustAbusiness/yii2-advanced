<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Companies $model */

$this->title = Yii::t('app', 'Create Companies');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Companies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companies-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
