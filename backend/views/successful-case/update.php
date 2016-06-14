<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SuccessfulCase */

$this->title = Yii::t('common', 'Update {modelClass}: ', [
    'modelClass' => Yii::t('common','Successful Case'),
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Successful Case'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('common', 'Update');
?>
<div class="successful-case-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
