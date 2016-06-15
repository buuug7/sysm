<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Ydgwkdsld */

$this->title = Yii::t('common', 'Create {modelClass}', [
  'modelClass' => '移动光网宽带受理单',
]);
$this->params['breadcrumbs'][] = ['label' => '移动光网宽带受理单', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ydgwkdsld-create">

  <?php echo $this->render('_form', [
    'model' => $model,
  ]) ?>

</div>
