<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%audio}}`.
 */
class m200531_081838_create_audio_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%audio}}', [
            'id' => $this->primaryKey(),
            'src' => $this->string()->notNull()->comment('путь к аудиофайлу'),
            'answer' => $this->string()->notNull()->comment('Ответ, который нужно ввести'),
            'text' => $this->text()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%audio}}');
    }
}
