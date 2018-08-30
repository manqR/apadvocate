<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property string $idclient
 * @property string $nama
 * @property string $email
 * @property double $tagihan
 * @property string $password
 * @property string $auth_key
 * @property string $status
 * @property string $user_create
 * @property string $date_create
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idclient', 'nama', 'email', 'tagihan', 'password', 'status', 'user_create', 'date_create'], 'required'],
            [['tagihan'], 'number'],
            [['status'], 'string'],
            [['date_create'], 'safe'],
            [['idclient'], 'string', 'max' => 10],
            [['nama'], 'string', 'max' => 100],
            [['email', 'auth_key', 'user_create'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 255],
            [['idclient'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idclient' => 'Idclient',
            'nama' => 'Nama',
            'email' => 'Email',
            'tagihan' => 'Tagihan',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'status' => 'Status',
            'user_create' => 'User Create',
            'date_create' => 'Date Create',
        ];
    }
}
