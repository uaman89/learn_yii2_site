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

class RegForm extends Model
{

    public $username;
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'required']
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Ім\'я коритсувача',
            'email' => 'Ел. пошта',
            'password' => 'пароль'
        ];
    }
}