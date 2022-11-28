<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Zarplata */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Zarplatas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="zarplata-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'id_employee',
                'label' => 'Працівник:',
                'value' => $model->employee->name,
            ],
            [
                'attribute' => 'id_category',
                'label' => 'Тип напрямку:',
                'value' => $model->category->nazva,
            ],
            [
                'attribute' => 'id_work',
                'label' => 'Проект:',
                'value' => $model->project->name,
            ],
            'hour',
            'suma',
        ],
    ]) ?>

</div>
