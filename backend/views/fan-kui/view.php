<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use common\models\Fankui;

/* @var $this yii\web\View */
/* @var $model common\models\FanKui */

$this->title = $model->sn;
$this->params['breadcrumbs'][] = ['label' => '意见反馈与报修', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fankui-view">

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

      [
        'attribute' => 'user_id',
        'value' => $model->user ? $model->user->username : null,

      ],
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

      'customer_confirm_name',
      'customer_confirm_time:datetime',
      'business_person_name',
      'business_person_phone',
      'created_at:datetime',
      'updated_at:datetime',
      [
        'attribute' => 'progress',
        'value' => ArrayHelper::getValue(Fankui::getProgress(), $model->progress),
      ],
      [
        'attribute' => 'status',
        'value' => ArrayHelper::getValue(Fankui::getStatus(), $model->status),
      ],
    ],
  ]) ?>

</div>
