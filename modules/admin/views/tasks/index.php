<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\TasksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Задачи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">
    <p>
        <?= Html::a('Добавить задачу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            [
			'attribute' => 'type_id',
            'value' => 'types.name',
			'filter' => $types,
			],
			[
			'attribute' => 'status_id',
            'value' => 'statuses.name',
			'filter' => $statuses,
			],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
