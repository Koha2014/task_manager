<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $type_id
 * @property integer $status_id
 * @property string $begin_date
 * @property string $finish_date
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'type_id', 'status_id'], 'required'],
            [['description'], 'string'],
            [['type_id', 'status_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Описание',
            'type_id' => 'Тип',
            'status_id' => 'Статус',
        ];
    }
	
	  public function getStatuses()
    {
        return $this->hasOne(Statuses::className(), ['id' => 'status_id']);
    }
	
	  public function getTypes()
    {
        return $this->hasOne(Types::className(), ['id' => 'type_id']);
    }
}
