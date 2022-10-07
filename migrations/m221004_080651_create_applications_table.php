<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%applications}}`.
 */
class m221004_080651_create_applications_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%applications}}', [
            'id' => $this->primaryKey(),
            'full_name' => $this->string(),
            'phone_number' => $this->string(),
            'client_comment' => $this->text(),
            'status' => $this->string()->defaultValue('new')->notNull(),
            'date_meeting' => $this->timestamp(),
            'manager_comment' => $this->text(),
            'date_of_purchase' => $this->timestamp(),
            'appartment_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);

        $this->createIndex(
            'idx-applications-appartment_id',
            'applications',
            'appartment_id'
        );

        $this->addForeignKey(
            'fk-applications-appartment_id',
            'applications',
            'appartment_id',
            'appartments',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-applications-appartment_id',
            'applications'
        );

        $this->dropIndex(
            'idx-applications-appartment_id',
            'applications'
        );

        $this->dropTable('{{%applications}}');
    }
}
