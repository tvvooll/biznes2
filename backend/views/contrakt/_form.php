<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Contrakt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contrakt-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_employee')->textInput() ?>

    <?= $form->field($model, 'id_project')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
