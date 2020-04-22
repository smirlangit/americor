<?php

use app\widgets\HistoryList\HistoryList;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<!-- Переносим ссылку экспорта в общий шаблон, для того чтобы иметь возможность управлять им отдельно  -->
<div class="site-index">
<div class="panel panel-primary panel-small m-b-0">
    <div class="panel-body panel-body-selected">

        <div class="pull-sm-right">
            <?php if (true) {
                echo Html::a(Yii::t('app', 'CSV'), $linkExport,
                    [
                        'class' => 'btn btn-success',
                        'data-pjax' => 0
                    ]
                );
            } ?>
          
        </div>

    </div>
</div>

    <?= HistoryList::widget([
        'model'=>$model,
        'dataProvider'=>$dataProvider
    ]) ?>


</div>
