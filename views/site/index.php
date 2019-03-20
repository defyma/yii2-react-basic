<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

?>


<?=\app\components\ReactHelper::getReactJs($this, Yii::$app->controller)?>