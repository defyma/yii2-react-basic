<?php namespace app\components;

/**
 * WebHelper.php
 *
 * @Author: Defy M Aminuddin <defyma> <http://defyma.com>
 * @Email:  defyma85@gmail.com
 * @Filename: WebHelper.php
 */
use yii\base\Component;

class ReactHelper extends Component
{

    public static function getReactMode()
    {
        $rootPath = \Yii::getAlias('@app');
        $file = $rootPath . "/web/react-mode.txt";
        if (file_exists($file)) {
            $text = file_get_contents($file);
            return $text;
        } else {
            return "development";
        }
    }

    /**
     * getReactJs
     *
     * @param $context
     * @param $yiiAppCon
     */
    public static function getReactJs($context, $yiiAppCon)
    {
        $mode = ReactHelper::getReactMode();
        $module_name = $yiiAppCon->module->id;
        if($module_name == \Yii::$app->id) {
            $folder = $yiiAppCon->id . "/" . $yiiAppCon->action->id;
        } else {
            $folder = "modules/" . $module_name . "/" . $yiiAppCon->id . "/" . $yiiAppCon->action->id;
        }
        $appFolder = ($mode == "development") ? "chunk" : "build";
        $path = \Yii::getAlias('@app') . "/web/". $appFolder . "/" . $folder;

        $arrFile = [];
        $di = new \RecursiveDirectoryIterator($path);
        foreach (new \RecursiveIteratorIterator($di) as $filename => $file) {
            if(!is_dir($filename)) {
                $arrFile[] = $filename;
            }
        }

        foreach ($arrFile as $file)
        {
            $arr = explode($appFolder, $file);
            if(count($arr) > 1) {
                $context->registerJsFile('@web/'.$appFolder.$arr[1]."?def");
            }
        }
    }

}
