<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%appartments}}`.
 */
class m221004_075951_create_appartments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%appartments}}', [
            'id' => $this->primaryKey(),
            'house_number' => $this->string(),
            'floor' => $this->float(),
            'appartment_number' => $this->smallInteger(),
            'number_of_rooms' => $this->tinyInteger(),
            'appartment_area' => $this->float(),
            'living_space' => $this->float(),
            'price' => $this->float(),
            'currency' => $this->string(128),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%appartments}}');
    }
}
