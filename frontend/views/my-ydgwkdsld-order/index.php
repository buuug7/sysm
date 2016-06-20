<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/20
 * Time: 10:13
 * Desc:
 */

$this->title = '移动光网宽带订单';
$this->params['breadcrumbs'][] = ['label' => '查询订单', 'url' => ['/my-order/index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container content">

  <div class="headline">
    <h2>已提交的移动光网宽带受理单</h2>
  </div>
  <?php echo \yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],

      //'id',
      //''user_id,
      'sn',
      'customer_name',
      'customer_phone',
      // 'address',
      // 'address_detail',
      'package_price',
      // 'primary_phone_number',
      // 'secondly_phone_number_1',
      // 'secondly_phone_number_2',
      // 'secondly_phone_number_3',
      // 'customer_confirm_name',
      // 'customer_confirm_time:datetime',
      // 'business_person_name',
      // 'business_person_phone',
      // 'created_at',
      // 'update_at',
      [
        'class' => \common\grid\EnumColumn::className(),
        'attribute' => 'progress',
        'enum' => \common\models\Ydgwkdsld::getProgress(),
      ],
      // 'status',

      [
        'class' => 'yii\grid\ActionColumn',
        'template' => '{view}',
      ],
    ],
    'layout' => "{items}\n{summary}\n{pager}",
  ]); ?>

</div>


