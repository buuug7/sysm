<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/20
 * Time: 10:50
 * Desc:
 */

$this->title = '移动光网宽带订单';
$this->params['breadcrumbs'][] = ['label' => '查询订单', 'url' => ['/my-order/index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container content">

  <div class="headline">
    <h2>移动光网宽带受理单 ( <?= $model->sn ?> )</h2>
  </div>

  <?php echo \yii\widgets\DetailView::widget([
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
      // 'customer_confirm_time:datetime',
      'business_person_name',
      'business_person_phone',
      'created_at:datetime',
      // 'updated_at:datetime',
      [
        'attribute' => 'progress',
        'value' => \yii\helpers\ArrayHelper::getValue(\common\models\Ydgwkdsld::getProgress(), $model->progress),
      ],
      [
        'attribute' => 'status',
        'value' => \yii\helpers\ArrayHelper::getValue(\common\models\Ydgwkdsld::getStatus(), $model->status),
      ],
    ],
  ]) ?>
</div>
