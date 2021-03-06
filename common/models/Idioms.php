<?php

namespace common\models;

/**
 * This is the model class for table "idioms".
 *
 * @property int $id
 * @property string $name
 * @property string $translation
 */
class Idioms extends BaseItem
{
    public function rules()
    {
        return [
            [['name', 'translation'], 'required'],
            [['name', 'translation'], 'trim'],
            [['name', 'translation'], 'string', 'max' => 255],
        ];
    }
    public static function tableName()
    {
        return 'idioms';
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'translation' => 'Translation',
        ];
    }
}
