<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\WeekendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Weekends';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="weekend-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Weekend', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'id_employee',
                'value' => function ($model, $key, $index, $widget) {
                    return $model->employee->name;
                },
                'format' => 'raw',
            ],
            'start',
            'end',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
