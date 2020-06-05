<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%idioms}}`.
 */
class m200529_052505_create_idioms_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%idioms}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'translation' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%idioms}}');
    }
}
