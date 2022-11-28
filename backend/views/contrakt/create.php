<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Contrakt */

$this->title = 'Create Contrakt';
$this->params['breadcrumbs'][] = ['label' => 'Contrakts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contrakt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
