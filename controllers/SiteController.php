<?php

namespace app\controllers;

use app\components\ReactHelper;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $this->view->title = 'Index';

        //added Meta Tag
        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Description of the page...'
        ]);

        return ReactHelper::renderReactJs();
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $this->view->title = 'About Page';

        return ReactHelper::renderReactJs();
    }

    /**
     * @return Response
     */
    public function actionGetdata()
    {
        //for example loading
        sleep(3);

        $data = [
            'success' => true,
            'message' => "This Message From Ajax Call"
        ];

        return $this->asJson($data);
    }
}
