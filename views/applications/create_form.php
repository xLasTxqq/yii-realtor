<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ApplicationModel $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="application-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'client_comment')->textarea(['rows' => 6]) ?>

    <!-- <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_meeting')->textInput() ?>

    <?= $form->field($model, 'manager_comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_of_purchase')->textInput() ?>

    <?= $form->field($model, 'appartment_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
