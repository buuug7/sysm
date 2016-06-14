<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/14
 * Time: 14:48
 * Desc:
 */

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AlbumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'Album');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-index">

  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <p>
    <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
      'modelClass' => Yii::t('common', 'Album'),
    ]), ['create'], ['class' => 'btn btn-success btn-flat']) ?>
  </p>

  <?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],

      //'id',
      'name',
      [
        'attribute' => 'category_id',
        'value' => function ($model)
        {
          return $model->category ? $model->category->title : null;
        }
      ],
      //'thumbnail_base_url:url',
      //'thumbnail_path',
      // 'url:url',
      'created_at:datetime',
      // 'updated_at',
      [
        'attribute' => 'thumbnail',
        'format' => 'html',
        'value' => function ($model)
        {
          return $model->thumbnail_path ? Html::img($model->getImageUrl(), ['style' => 'width: 200px', 'class' => 'img-responsive',]) : null;
        }
      ],
      [
        'class' => \common\grid\EnumColumn::className(),
        'attribute' => 'status',
        'enum' => [
          Yii::t('common', 'Not Active'),
          Yii::t('common', 'Active')
        ]
      ],

      ['class' => 'yii\grid\ActionColumn'],
    ],
    'layout' => "{items}\n{summary}\n{pager}",
  ]); ?>

</div>

