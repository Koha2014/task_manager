<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Types */

$this->title = 'Обновить тип задачи : ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Типы задач', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="types-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
