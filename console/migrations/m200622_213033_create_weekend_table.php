<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%weekend}}`.
 */
class m200622_213033_create_weekend_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%weekend}}', [
            'id' => $this->primaryKey(),
            'id_employee'=> $this->integer(),
            'start' => $this->string(),
            'end' => $this->string(),

        ]);
        $this->createIndex(
            'idx-weekend-id_employee',
            'weekend',
            'id_employee'
        );
        $this->addForeignKey(
            'fk-weekend-id_employee',
            'weekend',
            'id_employee',
            'employee',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
        'fk-weekend-id_employee',
        'weekend'
    );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-weekend-id_employee',
            'weekend'
        );
        $this->dropTable('{{%weekend}}');
    }
}
