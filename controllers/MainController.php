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

        $model = new RegForm();

        if ( $model->load( Yii::$app->request->post() ) /*&& $model->validate()*/){
            $res = $model->reg();
            if ( $res ){
                return $this->goHome();
            }
            else{

                Yii::$app->session->setFlash('error','Here is an error');
                Yii::error('error on reg');
                $this->refresh();
            }
        }


        return $this->render(
            'reg',
            [
                'model' => $model
            ]
        );
    }

    function actionLogin(){

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()){
            return $this->goBack();
        }

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
