<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel \backend\models\search\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Pages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <p>
    <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
      'modelClass' => Yii::t('backend', 'Pages'),
    ]), ['create'], ['class' => 'btn btn-success']) ?>
  </p>

  <?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
      'id',
      'title',
      'slug',
      'status',

      [
        'class' => 'yii\grid\ActionColumn',
        'template' => '{update} {delete}'
      ],
    ],
    'layout' => "{items}\n{summary}\n{pager}",
  ]); ?>

</div>
