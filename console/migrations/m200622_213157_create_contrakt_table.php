<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contrakt}}`.
 */
class m200622_213157_create_contrakt_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contrakt}}', [
            'id' => $this->primaryKey(),
            'id_employee' =>$this->integer(),
            'id_project' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-contrakt-id_employee',
            'contrakt',
            'id_employee'
        );
        $this->addForeignKey(
            'fk-contrakt-id_employee',
            'contrakt',
            'id_employee',
            'employee',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'idx-contrakt-id_project',
            'contrakt',
            'id_project'
        );
        $this->addForeignKey(
            'fk-contrakt-id_project',
            'contrakt',
            'id_project',
            'project',
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
            'fk-contrakt-id_employee',
            'contrakt'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-contrakt-id_employee',
            'contrakt'
        );
        $this->dropForeignKey(
        'fk-contrakt-id_project',
        'contrakt'
    );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-contrakt-id_project',
            'contrakt'
        );
        $this->dropTable('{{%contrakt}}');
    }
}
