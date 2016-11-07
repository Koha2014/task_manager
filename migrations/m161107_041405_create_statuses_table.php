<?php

use yii\db\Migration;

/**
 * Handles the creation for table `statuses`.
 */
class m161107_041405_create_statuses_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('statuses', [
            'id' => $this->primaryKey(),
			'name' => $this->string(255),
        ]);
		
		$this->insert('statuses', [
            'name' => 'В ожидании',
        ]);
		
		$this->insert('statuses', [
            'name' => 'Выполняется',
        ]);
		
		$this->insert('statuses', [
            'name' => 'Выполнено',
        ]);
		
		$this->insert('statuses', [
            'name' => 'Отменено',
        ]);
		
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('statuses');
    }
}
