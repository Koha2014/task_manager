<?php

use yii\db\Migration;

/**
 * Handles the creation for table `types`.
 */
class m161107_035948_create_types_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('types', [
            'id' => $this->primaryKey(),
			'name' => $this->string(255),
			'default' => $this->integer(3),
        ]);
		
		$this->insert('types', [
            'name' => 'Ошибка',
			'default' => 1,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('types');
    }
}
