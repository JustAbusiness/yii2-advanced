<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Branches $model */

$this->title = Yii::t('app', 'Create Branches');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Branches'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branches-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
