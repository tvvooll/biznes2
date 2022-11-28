<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "weekend".
 *
 * @property int $id
 * @property int|null $id_employee
 * @property string|null $start
 * @property string|null $end
 *
 * @property Employee $employee
 */
class Weekend extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'weekend';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_employee'], 'integer'],
            [['start', 'end'], 'string', 'max' => 255],
            [['id_employee'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['id_employee' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_employee' => 'Id Employee',
            'start' => 'Start',
            'end' => 'End',
        ];
    }

    /**
     * Gets query for [[Employee]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'id_employee']);
    }
}
