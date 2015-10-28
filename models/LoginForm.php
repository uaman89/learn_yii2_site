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
    public $email;
    public $rememberMe = true;
    public $status;


    public function rules(){
        return [
            [ ['username', 'password'] , 'required', 'on'=>'default' ],
            [ 'email', 'email' ],
            [ 'rememberMe', 'boolean'],
            [ 'password', 'validatePassword']
        ];
    }

    public function validatePassword($attribute){

        if (!$this->hasErrors()) { //if validation errors
            if ($this->password != '1234'){
                $this->addError($attribute, 'Wrong password');
            }
        }
        else Yii::$app->session->setFlash('hasErrors');
    }

    function attributeLabels(){
        return [
            'username' => 'Ім\'я коритсувача',
            'password' => 'пароль',
            'rememberMe' => 'запам\'ятати мене',
        ];
    }

    public function login(){
        if ($this->validate())
            return true;
        else
            return false;
    }

}
