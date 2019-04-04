<?php

namespace app\modules\contoh\controllers;

use yii\web\Controller;
use Yii;

class ProdukController extends Controller
{

    public function actionView()
    {
        return $this->render('view');
    }



}