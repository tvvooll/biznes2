<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employee_project}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%employee}}`
 * - `{{%project}}`
 */
class m200624_104208_create_junction_table_for_employee_and_project_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employee_project}}', [
            'employee_id' => $this->integer(),
            'project_id' => $this->integer(),
            'PRIMARY KEY(employee_id, project_id)',
        ]);

        // creates index for column `employee_id`
        $this->createIndex(
            '{{%idx-employee_project-employee_id}}',
            '{{%employee_project}}',
            'employee_id'
        );

        // add foreign key for table `{{%employee}}`
        $this->addForeignKey(
            '{{%fk-employee_project-employee_id}}',
            '{{%employee_project}}',
            'employee_id',
            '{{%employee}}',
            'id',
            'CASCADE'
        );

        // creates index for column `project_id`
        $this->createIndex(
            '{{%idx-employee_project-project_id}}',
            '{{%employee_project}}',
            'project_id'
        );

        // add foreign key for table `{{%project}}`
        $this->addForeignKey(
            '{{%fk-employee_project-project_id}}',
            '{{%employee_project}}',
            'project_id',
            '{{%project}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%employee}}`
        $this->dropForeignKey(
            '{{%fk-employee_project-employee_id}}',
            '{{%employee_project}}'
        );

        // drops index for column `employee_id`
        $this->dropIndex(
            '{{%idx-employee_project-employee_id}}',
            '{{%employee_project}}'
        );

        // drops foreign key for table `{{%project}}`
        $this->dropForeignKey(
            '{{%fk-employee_project-project_id}}',
            '{{%employee_project}}'
        );

        // drops index for column `project_id`
        $this->dropIndex(
            '{{%idx-employee_project-project_id}}',
            '{{%employee_project}}'
        );

        $this->dropTable('{{%employee_project}}');
    }
}
