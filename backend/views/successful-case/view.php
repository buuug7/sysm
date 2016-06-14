<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use common\models\SuccessfulCase;

/* @var $this yii\web\View */
/* @var $model common\models\SuccessfulCase */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Successful Case'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="successful-case-view">

  <p>
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
      'name',
      'url:url',
      //'thumbnail_base_url:url',
      //'thumbnail_path',
      [
        'attribute' => 'thumbnail',
        'format' => 'html',
        'value' => $model->thumbnail_path ? Html::img($model->getImageUrl(), ['style' => 'width: 100%', 'class' => 'img-responsive',]) : null,
      ],
      'slug',
      [
        'attribute' => 'status',
        'value' => ArrayHelper::getValue(SuccessfulCase::getStatus(), $model->status),
      ],
      'created_at',
      'updated_at',
    ],
  ]) ?>

</div>
