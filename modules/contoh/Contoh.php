<?php

namespace app\modules\contoh;

/**
 * master module definition class
 */
class Contoh extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\contoh\controllers';
    // public $defaultRoute = 'default/index';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
