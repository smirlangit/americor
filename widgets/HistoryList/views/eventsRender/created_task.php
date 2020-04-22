<?php 
use yii\helpers\Html;
/** @var app\models\History $model */ 
?>


<?php echo Html::tag('i', '', ['class' => "icon icon-circle icon-main white fa-gear bg-purple-light"]); ?>
<div class="bg-success ">
    <?php if (isset($model->ins_ts)): ?>
    <span>
       <?= \app\widgets\DateTime\DateTime::widget(['dateTime' => $model->ins_ts]) ?>
    </span>
<?php endif; ?>
    
</div>
<?php if(isset($model->user)): ?>
    <div class="bg-info"> <?= $model->user->username ?> </div>
<?php endif; ?>