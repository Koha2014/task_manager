<?php

namespace app\modules\admin\controllers;

use yii\filters\AccessControl;
use yii\filters\AccessRule;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{

 public $layout = "admin";
 
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
        ];
    }
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
