<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Zarplata */

$this->title = 'Update Zarplata: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Zarplatas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="zarplata-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
