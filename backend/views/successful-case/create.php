<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SuccessfulCase */

$this->title = Yii::t('common', 'Create {modelClass}', [
    'modelClass' => Yii::t('common', 'Successful Case'),
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Successful Case'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="successful-case-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
