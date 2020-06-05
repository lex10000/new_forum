<?php

namespace frontend\modules\user\controllers;

use yii\web\Controller;
use common\models\User;

class ProfileController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', [

        ]);
    }

}