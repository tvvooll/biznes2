<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property int $age
 * @property int $phone
 * @property string $osvita
 * @property int $id_work
 * @property int $id_category
 *
 * @property Contrakt[] $contrakts
 * @property Category $category
 * @property Work $work
 * @property Weekend[] $weekends
 * @property Zarplata[] $zarplatas
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'age', 'phone', 'osvita', 'id_work', 'id_category'], 'required'],
            [['age', 'phone', 'id_work', 'id_category'], 'integer'],
            [['name', 'surname', 'osvita'], 'string', 'max' => 255],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_category' => 'id']],
            [['id_work'], 'exist', 'skipOnError' => true, 'targetClass' => Work::className(), 'targetAttribute' => ['id_work' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'age' => 'Age',
            'phone' => 'Phone',
            'osvita' => 'Osvita',
            'id_work' => 'Id Work',
            'id_category' => 'Id Category',
        ];
    }

    /**
     * Gets query for [[Contrakts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContrakts()
    {
        return $this->hasMany(Contrakt::className(), ['id_employee' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'id_category']);
    }

    /**
     * Gets query for [[Work]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWork()
    {
        return $this->hasOne(Work::className(), ['id' => 'id_work']);
    }

    /**
     * Gets query for [[Weekends]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWeekends()
    {
        return $this->hasMany(Weekend::className(), ['id_employee' => 'id']);
    }

    /**
     * Gets query for [[Zarplatas]].
     *
     * @return \yii\db\ActiveQuery
     */

}
