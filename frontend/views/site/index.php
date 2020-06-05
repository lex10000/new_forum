<?php

/* @var $this yii\web\View */
/* @var $item common\models\Item */

$this->title = 'Welcome';
use yii\helpers\Url;
?>
<div class="promo">
    <div class="left">
        <h1><span class="title_underlined">StuffEng</span> - новый формат изучения английского языка</h1>
        <div class="left__text">
            Первая альфа версия приложения. Тестируем, не стесняемся, в дальнейшем будет написано Андройд приложение.
        </div>
    </div>
    <div class="right">
        <div class="wrapp">
            <h2>Что мы будем сегодня изучать?</h2>
            <div class="category">
                <a href="<?= Url::to('/testing/Idioms')?>" class="category__btn">Идиомы</a>
                <a href="<?= Url::to('/testing/Verbs')?>" class="category__btn">Фразеологические глаголы</a>
                <a href="<?= Url::to('/testing/Audio')?>" class="category__btn">Аудирование</a>
            </div>
        </div>
    </div>
</div>
