<?php

namespace app\controllers;
use app\models\RegForm;
use app\models\LoginForm;
use Yii;

class MainController extends \yii\web\Controller
{

    public $layout = 'basic';
    public $defaultAction = 'index';

    public function actionIndex()
    {
        $hello = "Слава Україні!";
        return $this->render(
            'index',
            [
                'hello'=>$hello
            ]
        );
    }


    function actionReg(){

        if ( Yii::$app->request->post() ){
            var_dump( Yii::$app->request->post() );
            Yii::$app->end();
        }

        $model = new RegForm();

        return $this->render(
            'reg',
            [
                'model' => $model
            ]
        );
    }

    function actionLogin(){

        $model = new LoginForm();

        return $this->render(
            'login',
            [
                'model' => $model
            ]
        );
    }

    public function actionSearch($search = null) //here $search is var from $_GET, NULL if it wasn't sent
    {
        //$search = Yii::$app->request->post('search');

        return $this->render(
            'search',
            [
                'search' => $search
            ]
        );
    }

}
