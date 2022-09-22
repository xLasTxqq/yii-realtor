<?php
$this->title = 'New flat';
?>
<div>
    <?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
    ]) ?>
    <?= $form->field($model, 'numberhouse')->textInput() ?>
    <?= $form->field($model, 'floor')->textInput() ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end() ?>

    <?php isset($model) ? print_r($model) : printf('net'); ?>
</div>
