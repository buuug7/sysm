<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use common\models\Ydgwkdsld;

/* @var $this yii\web\View */
/* @var $model common\models\Ydgwkdsld */

$this->title = $model->sn;
$this->params['breadcrumbs'][] = ['label' => '移动光网宽带受理单', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ydgwkdsld-view">

  <p>
    <?php echo Html::a(Yii::t('common', 'Print'), ['print', 'id' => $model->id,], ['class' => 'btn btn-success',]) ?>
    <?php echo Html::a(Yii::t('common', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?php echo Html::a(Yii::t('common', 'Delete'), ['delete', 'id' => $model->id], [
      'class' => 'btn btn-danger',
      'data' => [
        'confirm' => Yii::t('common', 'Are you sure you want to delete this item?'),
        'method' => 'post',
      ],
    ]) ?>
  </p>

  <?php echo DetailView::widget([
    'model' => $model,
    'attributes' => [
      'id',
      'user_id',
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
      'customer_confirm_name',
      'customer_confirm_time:datetime',
      'business_person_name',
      'business_person_phone',
      'created_at:datetime',
      'updated_at:datetime',
      [
        'attribute' => 'progress',
        'value' => ArrayHelper::getValue(Ydgwkdsld::getProgress(), $model->progress),
      ],
      [
        'attribute' => 'status',
        'value' => ArrayHelper::getValue(Ydgwkdsld::getStatus(), $model->status),
      ],
    ],
  ]) ?>

</div>
