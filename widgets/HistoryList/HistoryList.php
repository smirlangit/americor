<?php

namespace app\widgets\HistoryList;
use yii\base\Widget;


class HistoryList extends Widget
{
    
    //выносим переменные виджета в свойства класса
    public $model = null;
    public $dataProvider = null;


    public function run()
    {      
        //проверка на пустые данные
        if($this->model==null || $this->dataProvider == null){
            return '';
        }
        
        //получаем данные из контроллера и отдаем на рендер виджета
        return $this->render('main', [
                'model'=>$this->model,
                'dataProvider'=>$this->dataProvider  
        ]);
        
    }

}
