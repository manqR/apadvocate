<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property string $idpayment
 * @property string $idclient
 * @property string $keterangan
 * @property double $nominal
 * @property string $bukti_transfer
 * @property string $user_approve
 * @property int $status
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
            [['idpayment', 'idclient', 'keterangan', 'nominal', 'user_approve', 'status', 'tanggal'], 'required'],
            [['nominal'], 'number'],
            [['status'], 'integer'],
            [['tanggal'], 'safe'],
            [['idpayment'], 'string', 'max' => 20],
            [['idclient'], 'string', 'max' => 10],
            [['keterangan'], 'string', 'max' => 100],
            [['bukti_transfer', 'user_approve'], 'string', 'max' => 50],
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
            'user_approve' => 'User Approve',
            'status' => 'Status',
            'tanggal' => 'Tanggal',
        ];
    }
}
