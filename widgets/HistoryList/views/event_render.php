<?php

/*

скрипт читает значение события $model->event и подключает рендер с таким же
 названием как и само событие
 далее все расчеты, того что должно отображаться, файл рендера составляет сам 
 добавление рендера для нового события происходит простым добавление нового файла (с именем события) в папку eventsRender текущего виджета
 если вид не найден, то рендерится файл по умолчанию _default

Для схематичной демострации, был собран дизайн для события created_task
Для остальных, просто вывод события

 */


/** @var app\models\History $model */

$fileName = $model->event;
$renderFolder = 'eventsRender';
$renderPath = $renderFolder.'/'.$fileName;

echo $fileName;
try{
    echo $this->render($renderPath, ["model"=>$model]); 
} catch (Exception $ex) {
   echo $this->render($renderFolder.'/default', ["model"=>$model]); 
}