<?php


namespace common\models;

use common\models\Audio;
use common\models\Idioms;
use common\models\Verbs;

class ItemFactory
{
    /**
     * @var BaseItem
     */
    public $model;

    private $items_namespace = "common\models\\";

    public function __construct(string $item_type)
    {
        $class_name = $this->items_namespace.$item_type;
        $this->model = new $class_name();
        return $this->model;
    }
}