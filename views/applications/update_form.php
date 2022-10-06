<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ApplicationModel $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="application-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model->appartment, 'house_number')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model->appartment, 'appartment_number')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model, 'client_comment')->textarea(['rows' => 6, 'readonly' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(['new' => 'New', 'processed' => 'Processed', 'customer' => 'Customer'], ['maxlength' => true]) ?>

    <?= $form->field($model, 'date_meeting')->input('datetime-local') ?>

    <?= $form->field($model, 'manager_comment')->textarea(['rows' => 6]) ?>

    <!-- <?= $form->field($model, 'date_of_purchase')->input('date') ?> -->

    <!-- <?= $form->field($model, 'appartment_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    let select = document.querySelector('#applicationmodel-status');
    let date_meeting = document.querySelector('.field-applicationmodel-date_meeting');
    let manager_comment = document.querySelector('.field-applicationmodel-manager_comment');

    function check() {
        if (select.value === 'processed') {
            date_meeting.classList.remove("d-none")
            date_meeting.children.item(1).required = true
            manager_comment.classList.remove("d-none")
            manager_comment.children.item(1).required = true
        } else {
            date_meeting.classList.add("d-none")
            date_meeting.children.item(1).required = false
            manager_comment.classList.add("d-none")
            manager_comment.children.item(1).required = false
        }
    }
    check()
    select.addEventListener('change', check);
</script>