<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use frontend\models\Fankui;

/* @var $this yii\web\View */
/* @var $model frontend\models\FanKui */


$this->title = '宽带维护';
$this->params['breadcrumbs'][] = ['label' => '核心业务', 'url' => ['business-handing/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container content">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default margin-bottom-40">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-table"></i>意见反馈与报修受理单(<?=$model->sn?>)</h3>
        </div>
        <div class="panel-body">
          <p class="text-info">
            您提交的表单信息如下,您可以在该网站的 <b>互动平台</b> 栏目下面的 <a href="#">我的业务</a> 中查看处理进度
          </p>
        </div>
        <?php echo DetailView::widget([
          'model' => $model,
          'attributes' => [
            //'id',
            //'user_id',
            'sn',
            'customer_name',
            'customer_phone',
            'address',
            'address_detail',

            'error_code',
            [
              'attribute' => 'red_light_flashing',
              'value' => ArrayHelper::getValue(Fankui::getRedLightFlashingStatus(), $model->red_light_flashing),
            ],
            'detail_description',
            //'business_person_name',
            //'business_person_phone',
            'created_at:datetime',
            // 'updated_at:datetime',
            [
              'attribute' => 'progress',
              'value' => ArrayHelper::getValue(Fankui::getProgress(), $model->progress),
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
