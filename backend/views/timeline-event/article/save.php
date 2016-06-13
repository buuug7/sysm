<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2015/12/14
 * Time: 17:36
 * Desc:
 */
?>
<div class="timeline-item">
    <span class="time">
        <i class="fa fa-clock-o"></i>
		<?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?>
    </span>

	<h3 class="timeline-header">
		<?php if ($model->data['method'] === 'insert'): ?>
			<?= Yii::t('common', 'a new article ( {model_name} ) was created!', ['model_name' => $model->data['model_name']]) ?>
		<?php else: ?>
			<?= Yii::t('common', 'article ( {model_name} ) was updated!', ['model_name' => $model->data['model_name']]) ?>
		<?php endif; ?>
	</h3>

	<div class="timeline-body">
		<?php if ($model->data['method'] === 'insert'): ?>
			<?php echo Yii::t('common', '{created_time} : {created_by} created a new article ( {model_name} )', [
				'created_time' => Yii::$app->formatter->asDatetime($model->data['created_time']),
				'created_by' => $model->data['created_by'],
				'model_name' => $model->data['model_name'],
			]) ?>
		<?php else: ?>
			<?php echo Yii::t('common', '{created_time} : {created_by} article ( {model_name} ) was updated', [
				'created_time' => Yii::$app->formatter->asDatetime($model->data['created_time']),
				'created_by' => $model->data['created_by'],
				'model_name' => $model->data['model_name'],
			]) ?>
		<?php endif; ?>
	</div>

	<div class="timeline-footer">

	</div>
</div>
