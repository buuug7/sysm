<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/14
 * Time: 14:48
 * Desc:
 */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;
use common\models\Album;

/* @var $this yii\web\View */
/* @var $model common\models\Album */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Album'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-view">

  <p>
    <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
      'class' => 'btn btn-danger',
      'data' => [
        'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
        'method' => 'post',
      ],
    ]) ?>
  </p>

  <?php echo DetailView::widget([
    'model' => $model,
    'attributes' => [
      //'id',
      'name',
      //'thumbnail_base_url:url',
      //'thumbnail_path',
      [
        'attribute' => 'thumbnail',
        'format' => 'html',
        'value' => $model->thumbnail_path ? Html::img($model->getImageUrl(), ['style' => 'width: 100%', 'class' => 'img-responsive',]) : null,
      ],
      'url:url',
      'created_at:datetime',
      'updated_at:datetime',
      [
        'attribute' => 'status',
        'value' => ArrayHelper::getValue(Album::getStatus(), $model->status),
      ],
    ],
  ]) ?>

</div>
