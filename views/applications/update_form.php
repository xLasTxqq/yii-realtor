<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

// AppAsset::register($this);
$this->registerJsFile('@web/js/applications_update_form.js')
/** @var yii\web\View $this */
/** @var app\models\ApplicationModel $model */
/** @var yii\widgets\ActiveForm $form */
?>
<div class="application-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model->appartment, 'house_number')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model->appartment, 'appartment_number')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'client_comment')->textarea(['rows' => 6, 'readonly' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(['new' => 'New', 'processed' => 'Processed', 'customer' => 'Customer'], ['maxlength' => true]) ?>

    <?= $form->field($model, 'date_meeting')->input('datetime-local') ?>

    <?= $form->field($model, 'manager_comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>