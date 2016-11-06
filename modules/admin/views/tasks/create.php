<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tasks */

$this->title = 'Добавить задачу';
$this->params['breadcrumbs'][] = ['label' => 'Задачи', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-create">
    <?= $this->render('_form', [
        'model' => $model,
		'types' => $types,
		'statuses' => $statuses,
    ]) ?>

</div>
