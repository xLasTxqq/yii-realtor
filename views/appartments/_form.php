<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AppartmentModel $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="appartment-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'house_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'floor')->textInput() ?>

    <?= $form->field($model, 'appartment_number')->textInput() ?>

    <?= $form->field($model, 'number_of_rooms')->textInput() ?>

    <?= $form->field($model, 'appartment_area')->textInput() ?>

    <?= $form->field($model, 'living_space')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'currency')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
