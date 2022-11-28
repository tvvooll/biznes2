<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Zarplata */
/* @var $form yii\widgets\ActiveForm */
$employee = \common\models\Employee::find()->all();
$project = \common\models\Project::find()->all();
?>

<div class="zarplata-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_employee')->dropDownList(ArrayHelper::map($employee, 'id', 'name'), ['prompt' => 'Виберіть працівника:']) ?>

<!--    --><?//= $form->field($model, 'id_category')=?>

    <?= $form->field($model, 'id_project')->dropDownList(ArrayHelper::map($project, 'id', 'name'), ['prompt' => 'Виберіть проект:']) ?>

    <?= $form->field($model, 'hour')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'suma')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
