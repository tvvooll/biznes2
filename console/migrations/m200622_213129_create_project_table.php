<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project}}`.
 */
class m200622_213129_create_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project}}', [
            'id' => $this->primaryKey(),
            'id_client' => $this->integer(),
            'name' => $this->string(),
            'price' => $this->integer(),
        ]);
        $this->createIndex(
            'idx-project-id_client',
            'project',
            'id_client'
        );
        $this->addForeignKey(
            'fk-project-id_client',
            'project',
            'id_client',
            'client',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {$this->dropForeignKey(
        'fk-project-id_client',
        'project'
    );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-project-id_client',
            'project'
        );
        $this->dropTable('{{%project}}');
    }
}
