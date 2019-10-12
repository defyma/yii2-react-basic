<?php

namespace app\modules\contoh\controllers;

use app\components\ReactHelper;
use yii\web\Controller;
use Yii;

class ProdukController extends Controller
{

    public function actionView()
    {
        $this->view->title = 'Module Produk View';
        return ReactHelper::renderReactJs();
    }



}