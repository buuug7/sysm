<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use common\models\Ydgwkdsld;

/* @var $this yii\web\View */
/* @var $model frontend\models\Ydgwkdsld */


$this->title = '宽带办理';
$this->params['breadcrumbs'][] = ['label' => '核心业务', 'url' => ['business-handing/index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="container content">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default margin-bottom-40">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-table"></i>移动光网宽带受理单(<?=$model->sn?>)</h3>
        </div>
        <div class="panel-body">
          <p class="text-info">
            您提交的表单信息如下,您可以在该网站的 <b>互动平台</b> 栏目下面的 <a href="#">我的业务</a> 中查看处理进度
          </p>
        </div>
        <?php echo DetailView::widget([
          'model' => $model,
          'options' => [
            'class' => 'table table-hover',
          ],
          'attributes' => [
            //'id',
            //'user_id',
            'sn',
            'customer_name',
            'customer_phone',
            'address',
            'address_detail',
            'package_price',
            'primary_phone_number',
            'secondly_phone_number_1',
            'secondly_phone_number_2',
            'secondly_phone_number_3',
            //'customer_confirm_name',
            //'customer_confirm_time:datetime',
            //'business_person_name',
            //'business_person_phone',
            'created_at:datetime',
            // 'updated_at:datetime',
            [
              'attribute' => 'progress',
              'value' => ArrayHelper::getValue(Ydgwkdsld::getProgress(), $model->progress),
            ],
          ],
        ]) ?>
      </div>
    </div>
  </div>
</div>

<?php
$js = <<<JS
$(function(){
window.onbeforeunload = function() { return "You work will be lost."; };
});

JS;

$this->registerJs($js);


?>
