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
<div class="ydgwkdsld-view">

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

<?php
$js = <<<JS
$(function(){
window.onbeforeunload = function() { return "You work will be lost."; };
});

JS;

$this->registerJs($js);


?>
