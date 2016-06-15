<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Ydgwkdsld;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\YdgwkdsldSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '移动光网宽带受理单';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ydgwkdsld-index">

  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <p>
    <?php echo Html::a(Yii::t('common', 'Create {modelClass}', [
      'modelClass' => '移动光网宽带受理单',
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
        'enum' => Ydgwkdsld::getProgress(),
      ],
      // 'status',

      ['class' => 'yii\grid\ActionColumn'],
    ],
    'layout' => "{items}\n{summary}\n{pager}",
  ]); ?>

</div>
