<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "dokument".
 *
 * @property int $iddokumen
 * @property string $kategori
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
            [['kategori', 'idclient', 'filename', 'tanggal', 'user_upload'], 'required'],
            [['tanggal'], 'safe'],
            [['kategori', 'filename', 'user_upload'], 'string', 'max' => 50],
            [['idclient'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddokumen' => 'Iddokumen',
            'kategori' => 'Kategori',
            'idclient' => 'Idclient',
            'filename' => 'Filename',
            'tanggal' => 'Tanggal',
            'user_upload' => 'User Upload',
        ];
    }
}
