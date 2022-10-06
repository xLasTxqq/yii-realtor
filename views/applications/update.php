<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ApplicationModel $model */

$this->title = 'Update Application Model: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Application Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="application-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('update_form', [
        'model' => $model,
    ]) ?>

</div>
