<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Zarplata */

$this->title = 'Create Zarplata';
$this->params['breadcrumbs'][] = ['label' => 'Zarplatas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zarplata-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
