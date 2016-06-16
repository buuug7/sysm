<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/15
 * Time: 21:34
 * Desc:
 */

use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Ydgwkdsld */

$this->title = "打印表单(编号{$model->sn})";
$this->params['breadcrumbs'][] = ['label' => '意见反馈与保修', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="ydgwkdsld-print">
  <p>
    <?= Html::a('重新生成',['print','id' => $model->id,],['class' => 'btn btn-flat btn-info',]);?>
  </p>
  <?= $messages?>
</div>
