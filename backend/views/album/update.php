<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/14
 * Time: 14:48
 * Desc:
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Album */

$this->title = Yii::t('common', 'Update {modelClass}: ', [
    'modelClass' => Yii::t('common', 'Album'),
  ]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Album'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="album-update">

  <?php echo $this->render('_form', [
    'model' => $model,
    'categories' => $categories,
  ]) ?>

</div>
