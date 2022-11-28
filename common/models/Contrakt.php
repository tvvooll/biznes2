<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contrakt".
 *
 * @property int $id
 * @property int|null $id_employee
 * @property int|null $id_project
 *
 * @property Employee $employee
 * @property Project $project
 */
class Contrakt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contrakt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_employee', 'id_project'], 'integer'],
            [['id_employee'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['id_employee' => 'id']],
            [['id_project'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['id_project' => 'id']],
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
            'id_project' => 'Id Project',
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

    /**
     * Gets query for [[Project]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'id_project']);
    }
    public function getZarplatas()
    {
        return $this->hasMany(Zarplata::className(), ['id' => 'id_employee']);
    }
}
