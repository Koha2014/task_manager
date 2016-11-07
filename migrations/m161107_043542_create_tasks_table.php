<?php

use yii\db\Migration;

/**
 * Handles the creation for table `tasks`.
 */
class m161107_043542_create_tasks_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tasks', [
            'id' => $this->primaryKey(),
			'name' => $this->string(255),
			'description' => $this->text(),
			'type_id' => $this->integer(3),
			'status_id' => $this->integer(3)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tasks');
    }
}
