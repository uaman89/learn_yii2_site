<?php

namespace app\controllers;

class WidgetTestController extends \yii\web\Controller
{
    public function actionIndex()
    {


        return $this->render('index');

//        $search_some = 'привіт з ВіджетТестКонролер!';
//        $this->redirect([
//            'main/search',
//            'search' => $search_some
//        ]);

        //return Yii::$app->response->sendFile('files/file-to-download.txt')->send();

        //return 'string'; //return just string & nothing more, no one views
        //return $this->render('index'); //return 'index' view
    }

}
