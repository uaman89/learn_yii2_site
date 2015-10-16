<?php
/**
 * Created by PhpStorm.
 * User: olexandr
 * Date: 29.09.2015
 * Time: 23:09
 */
namespace app\components;

use yii\base\Widget;

class FirstWidget extends Widget{

    public $a;
    public $b;

    public function init(){

        parent::init();

        if ( $this->a === NULL ) $this->a = 0;
        if ( $this->b === NULL ) $this->b = 0;
    }

    public function run(){
        $c = $this->a + $this->b;
        return $this->render('first', ['c'=>$c] );
    }

}

?>