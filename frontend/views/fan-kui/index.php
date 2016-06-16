<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\FanKui */

$this->title = '宽带维护';
$this->params['breadcrumbs'][] = ['label' => '核心业务', 'url' => ['business-handing/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ydgwkdsld-index">

  <?php echo $this->render('_form', [
    'model' => $model,
  ]) ?>

</div>
