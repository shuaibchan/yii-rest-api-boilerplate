<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\HttpBearerAuth;



/**
 * Default controller for the `v1` module
 */
class UserController extends \yii\rest\ActiveController
{	
	public $modelClass = 'app\models\User';

	public function init()
	{
	    parent::init();
	    \Yii::$app->user->enableSession = false;   
	}
	public function behaviors()
    {
        $behaviors = parent::behaviors();
        // Use HTTP Bearer Authentication
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::className(),
        ];
        return $behaviors;
    }

    public function actionCreate()
    {
        $model = new User();
        $model->load(\Yii::$app->getRequest()->getBodyParams(), '');

        if ($model->validate() && $model->save()) {
            $response = \Yii::$app->getResponse();
            $response->setStatusCode(201);
            $id = implode(',', array_values($model->getPrimaryKey(true)));
            $response->getHeaders()->set('Location', Url::toRoute([$id], true));
        } else {
            // Validation error
            throw new HttpException(422, json_encode($model->errors));
        }

        return $model;
    }
	    
	    

}
