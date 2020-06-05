<?php

namespace common\models;

use Yii;
use common\models\BaseItem;

/**
 * This is the model class for table "audio".
 *
 * @property int $id
 * @property string $src путь к аудиофайлу
 * @property string $answer Ответ, который нужно ввести
 * @property string $text
 */
class Audio extends BaseItem
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'audio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['src', 'answer', 'text'], 'required'],
            [['text'], 'string'],
            [['answer', 'text'], 'trim'],
            [['src', 'answer'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'src' => 'Src',
            'answer' => 'Answer',
            'text' => 'Text',
        ];
    }
}
