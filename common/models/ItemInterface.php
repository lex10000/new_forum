<?php


namespace common\models;


interface ItemInterface
{
    public function nextItem();
    public function getRandItem();
    public function checkAnswer(int $id);
    public function getParam(int $id, string $option);
    public function lastWatched():void ;
    public function checkLimit() :bool ;
}