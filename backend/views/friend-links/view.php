<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/22
 * Time: 17:33
 * Desc:
 */
/* @var $this yii\web\View */
/* @var $model common\models\FriendLinks */

use yii\bootstrap\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use common\models\FriendLinks;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Friend Links'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="friend-links-view">
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
      'url:url',
      'slug',
      'sort',
      'created_at:datetime',
      'updated_at:datetime',
      [
        'attribute' => 'status',
        'value' => ArrayHelper::getValue(FriendLinks::getStatus(), $model->status),
      ],
    ],
  ]) ?>

</div>

