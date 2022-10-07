<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ApplicationModel $model */

$this->title = 'Create Application Model';
$this->params['breadcrumbs'][] = ['label' => 'Application Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('create_form', [
        'model' => $model,
    ]) ?>

</div>
