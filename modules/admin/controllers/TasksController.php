<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Tasks;
use app\modules\admin\models\TasksSearch;
use app\modules\admin\models\Statuses;
use app\modules\admin\models\Types;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use yii\filters\AccessRule;

/**
 * TasksController implements the CRUD actions for Tasks model.
 */
class TasksController extends Controller
{
 public $layout = "admin";
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
		  'access' => [
                'class' => AccessControl::className(),
				'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'rules' => [
                    ['allow' => true, 'roles' => ['@']],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tasks models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TasksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'types' => $this->getTypesList(),
		    'statuses' => $this->getStatusesList(),
        ]);
    }

    /**
     * Displays a single Tasks model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tasks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tasks();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/admin']);
        } else {
            return $this->render('create', [
                'model' => $model,
				'types' => $this->getTypesList(),
		        'statuses' => $this->getStatusesList(),
            ]);
        }
    }

    /**
     * Updates an existing Tasks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           return $this->redirect(['/admin']);
        } else {
            return $this->render('update', [
                'model' => $model,
				'types' => $this->getTypesList(),
		        'statuses' => $this->getStatusesList(),
            ]);
        }
    }

    /**
     * Deletes an existing Tasks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
	public function getTypesList()
	{
	return ArrayHelper::map(Types::find()->orderBy('default DESC')->all(),'id', 'name');
	}
	
	public function getStatusesList()
	{
	return ArrayHelper::map(Statuses::find()->all(),'id', 'name');
	}

    /**
     * Finds the Tasks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tasks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tasks::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
