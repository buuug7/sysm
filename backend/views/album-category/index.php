<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/14
 * Time: 14:33
 * Desc:
 */

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AlbumCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'Album Category');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-category-index">

  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <p>
    <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
      'modelClass' => Yii::t('common','Album Category'),
    ]), ['create'], ['class' => 'btn btn-success']) ?>
  </p>

  <?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [

      'id',
      'parent_id',
      'title',
      'slug',

      ['class' => 'yii\grid\ActionColumn'],
    ],
    'layout' => "{items}\n{summary}\n{pager}",
  ]); ?>

</div>

