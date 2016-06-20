<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Fankui;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FanKuiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '意见反馈与保修';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fankui-index">

  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <p>
    <?php echo Html::a(Yii::t('common', 'Create {modelClass}', [
      'modelClass' => '意见反馈与保修',
    ]), ['create'], ['class' => 'btn btn-success']) ?>
  </p>

  <?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],

      //'id',
      [
        'attribute' => 'user_id',
        'value' => function ($model)
        {
          return $model->user ? $model->user->username : null;
        }
      ],
      'sn',
      'customer_name',
      'customer_phone',
      // 'address',
      // 'address_detail',

      'error_code',
      [
        'class' => \common\grid\EnumColumn::className(),
        'attribute' => 'red_light_flashing',
        'enum' => \frontend\models\FanKui::getRedLightFlashingStatus(),
      ],

      // 'detail_description',

      // 'customer_confirm_name',
      // 'customer_confirm_time:datetime',
      // 'business_person_name',
      // 'business_person_phone',
      // 'created_at',
      // 'update_at',
      [
        'class' => \common\grid\EnumColumn::className(),
        'attribute' => 'progress',
        'enum' => Fankui::getProgress(),
      ],
      // 'status',

      [
        'class' => 'yii\grid\ActionColumn',
        'template' => '{view} {update} {delete}',
        'visibleButtons' => [
          'update' => function ($model)
          {
            return Yii::$app->user->can('forceUpdatePermission') ? true : ($model->progress !== Fankui::PROGRESS_FINISHED);
          },
          'delete' => Yii::$app->user->can('deletePermission'),
        ],

      ],
    ],
    'layout' => "{items}\n{summary}\n{pager}",
  ]); ?>

</div>
