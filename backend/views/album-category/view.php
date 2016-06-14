<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/14
 * Time: 14:34
 * Desc:
 */

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AlbumCategory */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Album Category'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-category-view">

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
      'id',
      'parent_id',
      'title',
      'slug',
    ],
  ]) ?>

</div>

