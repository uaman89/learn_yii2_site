<?php
/**
 * Created by PhpStorm.
 * User: olexandr
 * Date: 05.10.2015
 * Time: 21:46
 */

namespace app\models;

use yii\base\Model;
use Yii;

class LoginForm extends Model{

    public $username;
    public $password;

    public function rules(){
        return [
            [ ['username', 'password'] , 'required' ],
        ];
    }

    function attributeLabels(){
        return [
            'username' => 'Ім\'я коритсувача',
            'password' => 'пароль'
        ];
    }

}
