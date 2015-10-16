<?php
/**
 * Created by PhpStorm.
 * User: olexandr
 * Date: 29.09.2015
 * Time: 23:09
 */
namespace app\components;

use yii\base\Widget;

class SecondWidget extends Widget{

    public function init(){

        parent::init();
        ob_start();
    }

    public function run(){
        $content = ob_get_clean();
        return $this->render(
            'second',
            [
                'content'=>$content
            ]
        );
    }

}

?>