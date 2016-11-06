<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "types".
 *
 * @property integer $id
 * @property string $name
 */
class Types extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
			[['id', 'default'], 'integer'],
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
			'default' => 'Тип по умолчанию',
        ];
    }
	
	  private function getYesNoText() {
                return $this->yesNoOptions[$this->default];
        }
        
        public function getYesNoOptions() {
                return array(
                        0 => 'No',
                        1 => 'Yes',
                );
        }
}
