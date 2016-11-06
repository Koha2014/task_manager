<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tasks */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Задачи', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
	    <?= Html::a('Список задач', ['/admin'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'description:ntext',
            ['attribute' => 'type_id',
			'value' => $model->types->name,
			],
            ['attribute' => 'status_id',
			'value' => $model->statuses->name,
			]
        ],
    ]) ?>

</div>
