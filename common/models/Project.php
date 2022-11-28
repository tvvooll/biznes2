<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property int|null $id_client
 * @property string|null $name
 * @property int|null $price
 *
 * @property Contrakt[] $contrakts
 * @property Client $client
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_client', 'price'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id_client'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['id_client' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_client' => 'Id Client',
            'name' => 'Name',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[Contrakts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContrakts()
    {
        return $this->hasMany(Contrakt::className(), ['id_project' => 'id']);
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'id_client']);
    }
}
