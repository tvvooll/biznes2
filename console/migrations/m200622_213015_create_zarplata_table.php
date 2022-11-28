<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%zarplata}}`.
 */
class m200622_213015_create_zarplata_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%zarplata}}', [
            'id' => $this->primaryKey(),
            'id_employee' => $this->integer(),
            'id_category' => $this->integer(),
            'id_project' => $this->integer(),
            'hour' => $this->string(),
            'suma'=> $this->string(),
        ]);
        $this->createIndex(
            'idx-zarplata-id_employee',
            'zarplata',
            'id_employee'
        );
        $this->createIndex(
            'idx-zarplate-id_project',
            'zarplata',
            'id_project'
        );
        $this->createIndex(
            'idx-zarplate-id_category',
            'zarplata',
            'id_category'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-zarplata-id_project',
            'zarplata',
            'id_project',
            'project',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-zarplata-id_category',
            'zarplata',
            'id_category',
            'category',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-zarplata-id_employee',
            'zarplata',
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
    { $this->dropForeignKey(
        'fk-zarplata-id_project',
        'zarplata'
    );
        $this->dropIndex(
            'idx-zarplata-id_project',
            'zarplata'
        );
        $this->dropForeignKey(
        'fk-zarplata-id_category',
        'zarplata'
    );
        // drops index for column `author_id`
        $this->dropIndex(
            'idx-zarplata-id_category',
            'zarplata'
        );
        $this->dropForeignKey(
            'fk-zarplata-id_employee',
            'zarplata'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-zarplata-id_employee',
            'zarplata'
        );
        $this->dropTable('{{%zarplata}}');
    }
}
