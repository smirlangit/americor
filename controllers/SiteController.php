<?php

namespace app\controllers;

use app\models\search\IHistorySearch;

use yii\helpers\ArrayHelper;
use app\widgets\Export\Export;
use yii\helpers\Url;


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class SiteController extends Controller 
{
    public $historySearch;
    
    public function __construct($id, $module, IHistorySearch $historySearch) {
        
        //выносим модель HistorySearch в DI на тот случай если источник данных нужно будет поменять
        //так как источник данных используется один и тот же, делаем его singleton и общим для всех
        $this->historySearch = $historySearch;
        
        parent::__construct($id, $module);
    }
    
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
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {               
       $params = Yii::$app->request->queryParams;
       
       $model = $this->historySearch;
       $dataProvider = $this->historySearch->search($params);
       
       //переносим ссылку экспорта в массив данных
       $linkExport = $this->getLinkExport();
     
       return $this->render('index', ['model'=>$model, 'dataProvider'=>$dataProvider, 'linkExport'=>$linkExport]);
    }


    /**s
     * @param integer $customerId
     * @param string $exportType
     * @return string
     */
    public function actionExport($exportType)
    {
        $model = $this->historySearch;
        
        return $this->render('export', [
            'dataProvider' => $model->search(\Yii::$app->request->queryParams),
            'exportType' => $exportType,
            'model' => $model
        ]);
    }
    
    
        /**
     * @return string
     */
    private function getLinkExport()
    {
        $params = \Yii::$app->getRequest()->getQueryParams();
        $params = ArrayHelper::merge([
            'exportType' => Export::FORMAT_CSV
        ], $params);
        $params[0] = 'site/export';

        return Url::to($params);
    }
    
}
