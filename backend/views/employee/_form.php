<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Employee */
/* @var $form yii\widgets\ActiveForm */
$category = \common\models\Category::find()->all();
$work = \common\models\Work::find()->all();
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'osvita')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_work')->dropDownList(ArrayHelper::map($work, 'id', 'nazva'), ['prompt' => 'Виберіть тип роботи:']) ?>

    <?= $form->field($model, 'id_category')->dropDownList(ArrayHelper::map($category, 'id', 'nazva'), ['prompt' => 'Виберіть спеціалізацію:']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
