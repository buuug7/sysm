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
<div class="fankui-view">

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

<?php
$js = <<<JS
$(function(){
window.onbeforeunload = function() { return "You work will be lost."; };
});

JS;

$this->registerJs($js);

?>
