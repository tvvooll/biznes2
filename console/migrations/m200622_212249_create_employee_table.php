<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employee}}`.
 */
class m200622_212249_create_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employee}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'surname' => $this->string(255)->notNull(),
            'age' => $this->integer(11)->notNull(),
            'phone' => $this->integer(11)->notNull(),
            'osvita' => $this->string(255)->notNull(),
            'id_work' => $this->integer(11)->notNull(),
            'id_category' => $this->integer(11)->notNull()
        ]);
        $this->createIndex(
            'idx-employee-id_work',
            'employee',
            'id_work'
        );
        $this->createIndex(
            'idx-employee-id_category',
            'employee',
            'id_category'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-employee-id_category',
            'employee',
            'id_category',
            'category',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-employee-id_work',
            'employee',
            'id_work',
            'work',
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
            'fk-employee-id_category',
            'employee'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-employee-id_category',
            'employee'
        );
        $this->dropForeignKey(
            'fk-employee-id_work',
            'employee'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-employee-id_work',
            'employee'
        );
        $this->dropTable('{{%employee}}');
    }
}
