<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Ydgwkdsld */

$this->title = Yii::t('common', 'Update {modelClass}: ', [
    'modelClass' => '意见反馈与报修',
  ]) . ' ' . $model->sn;
$this->params['breadcrumbs'][] = ['label' => '意见反馈与报修', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sn, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('common', 'Update');
?>
<div class="fankui-update">

  <?php echo $this->render('_form', [
    'model' => $model,
  ]) ?>

</div>
