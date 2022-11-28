<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "zarplata".
 *
 * @property int $id
 * @property int|null $id_employee
 * @property int|null $id_category
 * @property int|null $id_project
 * @property string|null $hour
 * @property string|null $suma
 *
 * @property Category $category
 * @property Employee $employee
 * @property Project $project
 */
class Zarplata extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zarplata';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hour', 'suma','id_employee', 'id_category', 'id_project'], 'integer'],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_category' => 'id']],
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
            'id_category' => 'Id Category',
            'id_project' => 'Id Project',
            'hour' => 'Hour',
            'suma' => 'Suma',
        ];
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
    public function getNameCategory(){
        $this->id_category = $this->employee->id_category;
    }
    public function getZarplata(){
        if($this->employee->id_work == '1' )
        {
            $this->suma = $this->category->price * $this->hour;
        }
        elseif($this->employee->id_work == '2' )
        {
            $this->suma = $this->project->price;
        }

    }
}
