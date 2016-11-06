<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tasks */

$this->title = 'Редактировать задачу "'.$model->name.'"';
$this->params['breadcrumbs'][] = ['label' => 'Задачи', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="tasks-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'types' => $types,
		'statuses' => $statuses,
    ]) ?>

</div>
