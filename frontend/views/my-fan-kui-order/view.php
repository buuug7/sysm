<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/20
 * Time: 10:50
 * Desc:
 */

$this->title = '意见反馈与报修受理订单';
$this->params['breadcrumbs'][] = ['label' => '查询订单', 'url' => ['/my-order/index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container content">
  <div class="headline">
    <h2>反馈与报修受理单编号 ( <?= $model->sn ?>)</h2>
  </div>

  <?php echo \yii\widgets\DetailView::widget([
    'model' => $model,
    'attributes' => [
      // 'id',
      // 'user-id',
      'sn',
      'customer_name',
      'customer_phone',
      'address',
      'address_detail',

      'error_code',

      [
        'attribute' => 'red_light_flashing',
        'value' => \yii\helpers\ArrayHelper::getValue(\frontend\models\FanKui::getRedLightFlashingStatus(), $model->red_light_flashing),
      ],
      'detail_description',

      'customer_confirm_name',
      'customer_confirm_time:datetime',
      'business_person_name',
      'business_person_phone',
      'created_at:datetime',
      'updated_at:datetime',
      [
        'attribute' => 'progress',
        'value' => \yii\helpers\ArrayHelper::getValue(\frontend\models\FanKui::getProgress(), $model->progress),
      ],
      [
        'attribute' => 'status',
        'value' => \yii\helpers\ArrayHelper::getValue(\frontend\models\FanKui::getStatus(), $model->status),
      ],
    ],
  ]) ?>
</div>
