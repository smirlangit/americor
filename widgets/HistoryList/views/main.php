<?php

use yii\widgets\ListView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $model \app\models\search\IHistorySearch */


?>



<?php Pjax::begin(['id' => 'grid-pjax', 'formSelector' => false]); ?>

    <?php echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => 'event_render',        
        //'itemView' => '_item',        
        'options' => [
            'tag' => 'ul',
            'class' => 'list-group'
        ],
        'itemOptions' => [
            'tag' => 'li',
            'class' => 'list-group-item'
        ],
        'emptyTextOptions' => ['class' => 'empty p-20'],
        'layout' => '{items}{pager}',
    ]); ?>

<?php Pjax::end(); ?>
