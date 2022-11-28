<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ZarplataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zarplata-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_employee') ?>

    <?= $form->field($model, 'id_category') ?>

    <?= $form->field($model, 'id_project') ?>

    <?= $form->field($model, 'hour') ?>

    <?php // echo $form->field($model, 'suma') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
