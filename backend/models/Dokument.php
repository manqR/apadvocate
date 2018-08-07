<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "dokument".
 *
 * @property int $iddokumen
 * @property int $idcategory
 * @property string $idclient
 * @property string $filename
 * @property string $tanggal
 * @property string $user_upload
 */
class Dokument extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dokument';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcategory', 'idclient', 'filename', 'tanggal', 'user_upload'], 'required'],
            [['idcategory'], 'integer'],
            [['tanggal'], 'safe'],
            [['idclient'], 'string', 'max' => 10],
            [['filename', 'user_upload'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddokumen' => 'Iddokumen',
            'idcategory' => 'Idcategory',
            'idclient' => 'Idclient',
            'filename' => 'Filename',
            'tanggal' => 'Tanggal',
            'user_upload' => 'User Upload',
        ];
    }
}
