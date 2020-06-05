<?php
namespace common\models;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use Yii;

class BaseItem extends ActiveRecord implements ItemInterface
{
    /**
     * Возвращает случайный неповторяющийся элемент из таблицы.
     * Просмотренный ранее элемент метод смотрит в Redis
     * @return ActiveRecord объект со случайным элементом
     */
    public function getRandItem()
    {
        $ids = $this->find()->select('id')->asArray()->all();
        $ids_array = ArrayHelper::getColumn($ids, 'id');
        $ids_array = array_flip($ids_array);
        $id = array_rand($ids_array);

        $redis = Yii::$app->redis;
        $last_id = (int) $redis->get("last_watched_{$this->tableName()}_id_user:".Yii::$app->user->getId());

        while ($id === $last_id){
            $id = array_rand($ids_array);
        }

        return $this->find()->where(['id' => $id])->limit(1)->one();
    }

    /**
     * Сохраняет id последней просмотренной записи. Необходимо для генерации случайной карточки
     *
     */
    public function lastWatched():void
    {
        //TODO сделать сохранение пяти последних просмотренных карточек
        $redis = Yii::$app->redis;
        $redis->set("last_watched_{$this->tableName()}_id_user:".Yii::$app->user->getId(), $this->id);
    }

    /**
     * Проверяет, превышен ли лимит просмотра карточки данной таблицы
     * @return bool
     */
    public function checkLimit():bool
    {
        //TODO сделать так, чтобы запись за прошлые сутки удалялась
        $redis = Yii::$app->redis;
        $date = date('Y-m-d');
        $user = Yii::$app->user->getId();

        $totalTasks = $redis->get("total_watched_{$this->tableName()}_id_user:{$user}_date:{$date}");
        if(!$totalTasks) {
            $redis->set("total_watched_{$this->tableName()}_id_user:{$user}_date:{$date}", 1);
        }
        if($totalTasks < Yii::$app->params['limitTasks']) {
            $redis->incr("total_watched_{$this->tableName()}_id_user:{$user}_date:{$date}");
            return true;
        } else return false;
    }
    /**
     * @param int $id id записи в таблице
     * @param string $option название параметра
     * Возвращает параметр модели по id
     * @return mixed $result параметр
     */
    public function getParam($id, $option)
    {
        $param =  $this->find()->select($option)->where(['id' => $id])->limit(1)->asArray()->one();
        $result = $param[$option];
        return $result;
    }

    public function checkAnswer($id)
    {
        $sql = "SELECT `answer` FROM {$this->tableName()} WHERE `id` = :id";
        return  Yii::$app->db->createCommand($sql)->bindValue(':id', $id)->queryOne();
    }
    public function nextItem()
    {
        // TODO: Implement nextItem() method.
    }
}