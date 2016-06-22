<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/22
 * Time: 17:28
 * Desc:
 */
/* @var $this yii\web\View */
/* @var $model common\models\Album */

$this->title = Yii::t('backend', 'Create {modelClass}', [
  'modelClass' => Yii::t('common', 'Friend Links'),
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Friend Links'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="friend-links-create">
  <?php echo $this->render('_form', [
    'model' => $model,
  ]) ?>
</div>


