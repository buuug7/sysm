<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\\models\search\ArticleCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Article Categories');
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="article-category-index">

  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <p>
    <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
      'modelClass' => Yii::t('backend', 'Article Categories'),
    ]), ['create'], ['class' => 'btn btn-success']) ?>
  </p>

  <?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [

      'id',
      [
        'attribute' => 'parent_id',
        'value' => function ($model)
        {
          return $model->parent ? $model->parent->title : "root";
        },
      ],
      //'slug',
      'title',
      [
        'class' => \common\grid\EnumColumn::className(),
        'attribute' => 'status',
        'enum' => [
          Yii::t('common', 'Draft'),
          Yii::t('common', 'Active')
        ]
      ],

      [
        'class' => 'yii\grid\ActionColumn',
        'template' => '{update} {delete}'
      ],
    ],
  ]); ?>

</div>
