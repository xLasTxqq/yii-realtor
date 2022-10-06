<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AppartmentModel $model */

$this->title = 'Create Appartment Model';
$this->params['breadcrumbs'][] = ['label' => 'Appartment Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appartment-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
