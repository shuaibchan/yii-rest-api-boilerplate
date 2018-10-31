<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "token".
 *
 * @property int $id
 * @property string $type
 * @property string $value
 * @property string $secret
 * @property int $created_at
 * @property int $updated_at
 */
class Token extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'token';
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),     // Auto timestamp created and updated properties
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['type', 'value', 'secret'], 'string', 'max' => 45],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID mu ba',
            'type' => 'Type',
            'value' => 'Value',
            'secret' => 'Secret',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

     public function fields()
    {
        return [
            'id',
            'type',
            'value',
            'created_at',
            'updated_at'
        ];
    }
}

