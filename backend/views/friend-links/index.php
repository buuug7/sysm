<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/22
 * Time: 16:36
 * Desc:
 */

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FriendLinksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'Friend Links');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="friend-links-index">
  <p>
    <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
      'modelClass' => Yii::t('common', 'Friend Links'),
    ]), ['create'], ['class' => 'btn btn-success btn-flat',]); ?>
  </p>
  <?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
      // 'id',
      'name',
      'url',
      [
        'class' => \common\grid\EnumColumn::className(),
        'attribute' => 'category_id',
        'enum' => \common\models\FriendLinks::getCategories()
      ],

      //'slug',
      'sort',
      //'updated_at',
      //'created_at',
      [
        'class' => \common\grid\EnumColumn::className(),
        'attribute' => 'status',
        'enum' => \common\models\FriendLinks::getStatus(),
      ],
      ['class' => 'yii\grid\ActionColumn'],
    ],
    'layout' => "{items}\n{summary}\n{pager}",
  ]) ?>
</div>

