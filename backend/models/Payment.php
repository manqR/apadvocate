<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property string $idpayment
 * @property string $idclient
 * @property string $keterangan
 * @property double $nominal
 * @property string $bukti_transfer
 * @property string $user_input
 * @property string $tanggal
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpayment', 'idclient', 'keterangan', 'nominal', 'bukti_transfer', 'user_input', 'tanggal'], 'required'],
            [['nominal'], 'number'],
            [['tanggal'], 'safe'],
            [['idpayment'], 'string', 'max' => 20],
            [['idclient'], 'string', 'max' => 10],
            [['keterangan'], 'string', 'max' => 100],
            [['bukti_transfer', 'user_input'], 'string', 'max' => 50],
            [['idpayment'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpayment' => 'Idpayment',
            'idclient' => 'Idclient',
            'keterangan' => 'Keterangan',
            'nominal' => 'Nominal',
            'bukti_transfer' => 'Bukti Transfer',
            'user_input' => 'User Input',
            'tanggal' => 'Tanggal',
        ];
    }
}
