<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property integer $status
 * @property string $auth_key
 * @property integer $create_at
 * @property integer $update_at
 */
class User extends \yii\db\ActiveRecord
{

    const STATUS_ON_ACTIVE = 10;
    const STATUS_ON_NOT_ACTIVE = 1;
    const STATUS_ON_DELETED = 0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['username', 'email', 'password'], 'filter', 'filter'=>'trim'],
            [['username', 'email', 'status'], 'required'],
            ['email','email'],
            [['status', 'create_at', 'update_at'], 'integer'],
            ['username', 'string', 'min'=> 2, 'max' => 255],
            ['password', 'required', 'on' => 'create' ],
            ['username', 'unique', 'message' => 'this name is already used'],
            ['email', 'unique', 'message' => 'this email is already used']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'status' => 'Status',
            'auth_key' => 'Auth Key',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }
}
