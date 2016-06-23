<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Video */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Videos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-view">

    <p>
        <?php echo Html::a(Yii::t('common', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a(Yii::t('common', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('common', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'slug',
            'path',
            'base_url:url',
            'type',
            'size',
            'created_at',
            'updated_at',
            'status',
        ],
    ]) ?>

</div>
