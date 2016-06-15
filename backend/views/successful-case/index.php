<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\SuccessfulCaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'Successful Case');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="successful-case-index">

  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <p>
    <?php echo Html::a(Yii::t('common', 'Create {modelClass}', [
      'modelClass' => Yii::t('common', 'Successful Case'),
    ]), ['create'], ['class' => 'btn btn-success']) ?>
  </p>

  <?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [

      'id',
      'name',
      'url:url',
      //'thumbnail_base_url:url',
      //'thumbnail_path',
      [
        'attribute' => 'thumbnail',
        'format' => 'html',
        'value' => function ($model)
        {
          return $model->thumbnail_path ? Html::img($model->getImageUrl(), ['style' => 'width: 300px', 'class' => 'img-responsive',]) : null;
        }

      ],
      // 'slug',
      // 'status',
      [
        'class' => \common\grid\EnumColumn::className(),
        'attribute' => 'status',
        'enum' => \common\models\SuccessfulCase::getStatus(),
      ],
      // 'created_at',
      // 'updated_at',

      ['class' => 'yii\grid\ActionColumn'],
    ],
    'layout' => "{items}\n{summary}\n{pager}",
  ]); ?>

</div>
