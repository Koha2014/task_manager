<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Types;
use app\modules\admin\models\Tasks;
use app\modules\admin\models\TypesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\filters\AccessRule;

/**
 * TypesController implements the CRUD actions for Types model.
 */
class TypesController extends Controller
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
     * Lists all Types models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TypesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Types model.
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
     * Creates a new Types model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Types();

        if ($model->load(Yii::$app->request->post())) {
		if($model->default == 1)
		{
		$this->cancelOldDefault();
		}
		if($model->save())
		{
            return $this->redirect(['/admin/types']);
		}
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Types model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
		if($model->default == 1)
		{
		$this->cancelOldDefault();
		}
		if($model->save())
		{
            return $this->redirect(['/admin/types']);
		}
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Types model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
		if($model->delete())
		{
		$default_type = Types::find()->where(['default' => 1])->one();
		$type_tasks = Tasks::find()->where(['type_id' => $id])->all();
		if(!empty($type_tasks))
		{
		foreach($type_tasks AS $task)
		{
		$task->type_id = $default_type->id;
		$task->save();
		}
		}
		}
        return $this->redirect(['index']);
    }
	
	  public function cancelOldDefault()
    {
      $old_default = Types::find()->where(['default' => 1])->one();
	   	   
	   if(!empty($old_default))
	   {
	   $old_default->default = 0;
	   $old_default->save();
	   }
    }

    /**
     * Finds the Types model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Types the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Types::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
