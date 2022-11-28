<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $nazva
 * @property int|null $price
 *
 * @property Employee[] $employees
 * @property Zarplata[] $zarplatas
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nazva'], 'required'],
            [['price'], 'integer'],
            [['nazva'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nazva' => 'Nazva',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[Employees]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['id_category' => 'id']);
    }

    /**
     * Gets query for [[Zarplatas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getZarplatas()
    {
        return $this->hasMany(Zarplata::className(), ['id_category' => 'id']);
    }
}
