<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TypesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Типы задач';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="types-index">
    <p>
        <?= Html::a('Добавить тип задачи', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
	    'id' => 'tasks_grid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
			[
			'attribute' => 'default',
			'value' => function($model)
            {   
                if($model->default == 1)
                {
                    return 'Да';
                }
                else
                {   
                    return 'Нет';
                }
            },
			],

             //['class' => 'yii\grid\ActionColumn','template'=>'{update}  {delete}'],
			    [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'template' => ' {update} {delete}',
                'buttons' => [
                  'delete' => function($url,$model) {
                    if($model->default == 1) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('yii', 'Delete'),
                            'onclick' => 'alert("Вы пытаетесь удалить тип задач установленный по умолчанию. Сначала установите по умолчанию другой тип задач"); return false;'
                        ]);
                    }
                    $options = [
                        'title' => Yii::t('yii', 'Delete'),
                        'aria-label' => Yii::t('yii', 'Delete'),
                        'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                        'data-method' => 'post',
                        'data-pjax' => '0',
                    ];
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
                }
                        ]
                    ],
                
        ],
    ]); ?>
</div>
