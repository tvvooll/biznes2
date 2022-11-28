<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeeProject */

$this->title = 'Update Employee Project: ' . $model->employee_id;
$this->params['breadcrumbs'][] = ['label' => 'Employee Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employee_id, 'url' => ['view', 'employee_id' => $model->employee_id, 'project_id' => $model->project_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employee-project-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
