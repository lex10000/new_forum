<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%verbs}}`.
 */
class m200530_055213_create_verbs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%verbs}}', [
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
        $this->dropTable('{{%verbs}}');
    }
}
