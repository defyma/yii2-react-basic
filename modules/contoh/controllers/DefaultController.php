<?php

namespace app\modules\contoh\controllers;

use app\components\ReactHelper;
use yii\web\Controller;
use Yii;

class DefaultController extends Controller
{

    public function actionIndex()
    {
        $this->view->title = 'Module Default Index';
        return ReactHelper::renderReactJs();
    }



}