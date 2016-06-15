<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Ydgwkdsld */

$this->title = Yii::t('common', 'Update {modelClass}: ', [
    'modelClass' => '移动光网宽带受理单',
  ]) . ' ' . $model->sn;
$this->params['breadcrumbs'][] = ['label' => '移动光网宽带受理单', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sn, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('common', 'Update');
?>
<div class="ydgwkdsld-update">

  <?php echo $this->render('_form', [
    'model' => $model,
  ]) ?>

</div>
