<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ZarplataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заробітня платня';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zarplata-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Створити зарплату', ['create'], ['class' => 'btn btn-success']) ?>
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
            [
                'attribute' => 'id_category',
                'value' => function ($model, $key, $index, $widget) {
                    return $model->category->nazva;
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'id_project',
                'value' => function ($model, $key, $index, $widget) {
                    return $model->project->name;
                },
                'format' => 'raw',
            ],
//            'hour',
            'suma',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
