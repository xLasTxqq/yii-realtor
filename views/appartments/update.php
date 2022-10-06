<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AppartmentModel $model */

$this->title = 'Update Appartment Model: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Appartment Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="appartment-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
