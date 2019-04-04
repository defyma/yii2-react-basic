<?php

namespace app\modules\contoh\controllers;

use yii\web\Controller;
use Yii;

class DefaultController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }



}