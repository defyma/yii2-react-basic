<?php namespace app\components;

/**
 * ReactHelper.php
 *
 * @Author: Defy M Aminuddin <defyma> <http://defyma.com>
 * @Email:  defyma85@gmail.com
 * @Filename: ReactHelper.php
 */

use Exception;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Yii;
use yii\base\Component;

class ReactHelper extends Component
{
    /**
     * getReactMode
     *
     * @return string development | production
     * @default development
     */
    public static function getReactMode()
    {
        $rootPath = Yii::getAlias('@app');
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
     * @return string bundle
     */
    public static function renderReactJs()
    {
        $yiiAppCon = Yii::$app->controller;

        $mode = ReactHelper::getReactMode();
        $module_name = $yiiAppCon->module->id;
        if ($module_name == Yii::$app->id) {
            $folder = $yiiAppCon->id . "/" . $yiiAppCon->action->id;
        } else {
            $folder = "modules/" . $module_name . "/" . $yiiAppCon->id . "/" . $yiiAppCon->action->id;
        }
        $appFolder = ($mode == "development") ? "chunk" : "build";
        $path = Yii::getAlias('@app') . "/web/" . $appFolder . "/" . $folder;

        $arrFile = [];

        try {
            $di = new RecursiveDirectoryIterator($path);
            foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
                if (!is_dir($filename)) {
                    $arrFile[] = $filename;
                }
            }
        } catch (Exception $e) {
            echo "Please RUN: `npm start` for development OR `npm run build` for production!!";
            die();
        }


        foreach ($arrFile as $file) {
            $arr = explode($appFolder, $file);
            if (count($arr) > 1) {
                $yiiAppCon->getView()->registerJsFile('@web/' . $appFolder . $arr[1] . "?def");
            }
        }

        return $yiiAppCon->render('@app/views/layouts/main.react.php', [

        ]);
    }

}
