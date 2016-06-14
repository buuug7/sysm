<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/14
 * Time: 14:34
 * Desc:
 */
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AlbumCategory */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => Yii::t('common','Album Category'),
  ]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Album Category'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="album-category-update">

  <?php echo $this->render('_form', [
    'model' => $model,
    'categories' => $categories,
  ]) ?>

</div>
